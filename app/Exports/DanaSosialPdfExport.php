<?php

namespace App\Exports;

use App\Models\DanaSosial;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DanaSosialPdfExport implements FromView
{
    public function view(): View
    {
        return view('exports.dana-sosial-pdf', [
            'data' => DanaSosial::all()
        ]);
    }
}