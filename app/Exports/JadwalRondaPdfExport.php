<?php
namespace App\Exports;

use App\Models\JadwalRonda;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class JadwalRondaPdfExport implements FromView
{
    public function view(): View
    {
        return view('exports.jadwal-ronda-pdf', [
            'data' => JadwalRonda::all()
        ]);
    }
}