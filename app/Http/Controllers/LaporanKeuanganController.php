<?php

namespace App\Http\Controllers;

use App\Models\LaporanKeuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\LaporanKeuanganPdfExport;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        $data = LaporanKeuangan::orderBy('tanggal', 'asc')
                               ->orderBy('id', 'asc')
                               ->get();
        return response()->json($data);
    }

    public function exportPdf()
    {
        $data = LaporanKeuangan::orderBy('tanggal', 'asc')
                            ->orderBy('id', 'asc')
                            ->get();
        
        $runningSaldo = 0;
        foreach ($data as $item) {
            $runningSaldo = $runningSaldo + $item->debit - $item->kredit;
            $item->saldo = $runningSaldo;
        }
        
        $totalDebit = $data->sum('debit');
        $totalKredit = $data->sum('kredit');
        $saldoAkhir = $runningSaldo; 
        
        $pdf = Pdf::loadView('exports.laporan-keuangan-pdf', compact('data', 'totalDebit', 'totalKredit', 'saldoAkhir'));
        return $pdf->download('laporan-keuangan-' . date('Y-m-d') . '.pdf');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'kategori' => 'required|in:debit,kredit',
            'jumlah' => 'required|numeric|min:0',
            'saldo_awal' => 'nullable|numeric'
        ]);

        return DB::transaction(function () use ($validated) {
            $lastRecord = LaporanKeuangan::orderBy('tanggal', 'desc')
                                        ->orderBy('id', 'desc')
                                        ->first();
            
            if (!$lastRecord && isset($validated['saldo_awal'])) {
                $saldoSebelumnya = $validated['saldo_awal'];
            } else {
                $saldoSebelumnya = $lastRecord ? $lastRecord->saldo : 0;
            }
            
            $debit = $validated['kategori'] === 'debit' ? $validated['jumlah'] : 0;
            $kredit = $validated['kategori'] === 'kredit' ? $validated['jumlah'] : 0;
            $saldo = $saldoSebelumnya + $debit - $kredit; 

            $laporan = LaporanKeuangan::create([
                'tanggal' => $validated['tanggal'],
                'keterangan' => $validated['keterangan'],
                'debit' => $debit,
                'kredit' => $kredit,
                'saldo' => $saldo
            ]);

            return response()->json($laporan, 201);
        });
    }

    public function update(Request $request, LaporanKeuangan $laporanKeuangan)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'kategori' => 'required|in:debit,kredit',
            'jumlah' => 'required|numeric|min:0'
        ]);

        return DB::transaction(function () use ($validated, $laporanKeuangan) {
            $debit = $validated['kategori'] === 'debit' ? $validated['jumlah'] : 0;
            $kredit = $validated['kategori'] === 'kredit' ? $validated['jumlah'] : 0;

            $laporanKeuangan->update([
                'tanggal' => $validated['tanggal'],
                'keterangan' => $validated['keterangan'],
                'debit' => $debit,
                'kredit' => $kredit
            ]);

            $this->recalculateSaldo();

            return response()->json($laporanKeuangan);
        });
    }

    public function destroy(LaporanKeuangan $laporanKeuangan)
    {
        return DB::transaction(function () use ($laporanKeuangan) {
            $laporanKeuangan->delete();
            $this->recalculateSaldo();
            return response()->json(['message' => 'Data berhasil dihapus']);
        });
    }

    private function recalculateSaldo()
    {
        $records = LaporanKeuangan::orderBy('tanggal', 'asc')
                                ->orderBy('id', 'asc')
                                ->get();
        
        $saldo = 0;
        foreach ($records as $record) {
            $saldo = $saldo + $record->debit - $record->kredit; 
            $record->update(['saldo' => $saldo]);
        }
    }
}