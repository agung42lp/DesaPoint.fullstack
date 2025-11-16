<?php
namespace App\Exports;

use App\Models\LaporanKeuangan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanKeuanganPdfExport implements FromView
{
    public function view(): View
    {
        return view('exports.laporan-keuangan-pdf', [
            'data' => LaporanKeuangan::orderBy('tanggal', 'asc')->get()
        ]);
    }
}