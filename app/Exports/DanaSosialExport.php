<?php

namespace App\Exports;

use App\Models\DanaSosial;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DanaSosialExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DanaSosial::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Penerima',
            'Tanggal Penyerahan',
            'Kategori Bantuan',
            'Nominal Bantuan',
            'Foto Penyerahan',
            'Created At',
            'Updated At'
        ];
    }
}