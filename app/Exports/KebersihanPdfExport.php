<?php
namespace App\Exports;

use App\Models\Kebersihan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KebersihanPdfExport implements FromView
{
    public function view(): View
    {
        return view('exports.kebersihan-pdf', [
            'data' => Kebersihan::all()
        ]);
    }
}