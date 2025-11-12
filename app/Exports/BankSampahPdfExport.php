<?php
namespace App\Exports;

use App\Models\BankSampah;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BankSampahPdfExport implements FromView
{
    public function view(): View
    {
        return view('exports.bank-sampah-pdf', [
            'data' => BankSampah::all()
        ]);
    }
}