<?php

namespace App\Exports;

use App\Models\Baksos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BaksosExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Baksos::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Tanggal',
            'Keterangan',
            'Tanggal Dibuat'
        ];
    }

    public function map($baksos): array
    {
        return [
            $baksos->id,
            $baksos->nama,
            $baksos->tanggal,
            $baksos->keterangan,
            $baksos->created_at->format('d-m-Y H:i:s')
        ];
    }
}