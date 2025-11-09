<?php

namespace App\Exports;

use App\Models\BankSampah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BankSampahExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return BankSampah::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Total Sampah (kg)',
            'Total Uang (Rp)',
            'Tanggal Dibuat'
        ];
    }

    public function map($bankSampah): array
    {
        return [
            $bankSampah->id,
            $bankSampah->nama,
            $bankSampah->total_sampah,
            $bankSampah->total_uang,
            $bankSampah->created_at->format('d-m-Y H:i:s')
        ];
    }
}