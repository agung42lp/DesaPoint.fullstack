<?php
namespace App\Exports;

use App\Models\Pengaduan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PengaduanPdfExport implements FromView
{
    public function view(): View
    {
        return view('exports.pengaduan-pdf', [
            'data' => Pengaduan::all()
        ]);
    }
}