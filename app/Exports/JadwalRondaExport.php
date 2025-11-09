<?php

namespace App\Exports;

use App\Models\JadwalRonda;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class JadwalRondaExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return JadwalRonda::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tanggal',
            'Peserta Ronda',
            'Tanggal Dibuat'
        ];
    }

    public function map($jadwalRonda): array
    {
        return [
            $jadwalRonda->id,
            $jadwalRonda->tanggal,
            $jadwalRonda->peserta_ronda,
            $jadwalRonda->created_at->format('d-m-Y H:i:s')
        ];
    }
}