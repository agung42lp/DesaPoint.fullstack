<?php

namespace App\Http\Controllers;

use App\Models\BankSampah;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\BankSampahPdfExport;

class BankSampahController extends Controller
{
    public function index()
    {
        return response()->json(BankSampah::oldest()->get());
    }

    public function exportPdf()
    {
        $data = BankSampah::all();
        $pdf = Pdf::loadView('exports.bank-sampah-pdf', compact('data'));
        return $pdf->download('bank-sampah-' . date('Y-m-d') . '.pdf');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'total_sampah' => 'required|numeric|min:0',
            'total_konversi' => 'required|numeric|min:0',
            'saldo_cair' => 'required|numeric|min:0',
            'saldo_tersisa' => 'required|numeric|min:0',
        ]);

        $result = BankSampah::create($validated);
        return response()->json($result, 201);
    }

    public function update(Request $request, BankSampah $bankSampah)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'total_sampah' => 'required|numeric|min:0',
            'total_konversi' => 'required|numeric|min:0',
            'saldo_cair' => 'required|numeric|min:0',
            'saldo_tersisa' => 'required|numeric|min:0',
        ]);

        $bankSampah->update($validated);
        return response()->json($bankSampah);
    }

    public function destroy(BankSampah $bankSampah)
    {
        $bankSampah->delete();
        return response()->json(['message' => 'Deleted']);
    }

   public function getByName($name)
    {
        $bankSampah = BankSampah::where('nama', $name)->first();
        
        if (!$bankSampah) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        
        return response()->json($bankSampah);
    }
}