<?php

namespace App\Exports;

use App\Models\LaporanKeuangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanKeuanganExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return LaporanKeuangan::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tanggal',
            'Keterangan',
            'Jenis',
            'Jumlah (Rp)',
            'Tanggal Dibuat'
        ];
    }

    public function map($laporan): array
    {
        return [
            $laporan->id,
            $laporan->tanggal,
            $laporan->keterangan,
            $laporan->jenis,
            $laporan->jumlah,
            $laporan->created_at->format('d-m-Y H:i:s')
        ];
    }
}