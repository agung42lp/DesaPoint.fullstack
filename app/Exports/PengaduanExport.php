<?php

namespace App\Exports;

use App\Models\Pengaduan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PengaduanExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Pengaduan::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Pengirim',
            'RT',
            'Nomor Rumah',
            'No HP',
            'Judul Permasalahan',
            'Kategori',
            'Detail Permasalahan',
            'Status',
            'Tanggapan',
            'Tanggal Dibuat'
        ];
    }

    public function map($pengaduan): array
    {
        return [
            $pengaduan->id,
            $pengaduan->nama_pengirim,
            $pengaduan->rt,
            $pengaduan->nomor_rumah,
            $pengaduan->no_hp,
            $pengaduan->judul_permasalahan,
            $pengaduan->kategori,
            $pengaduan->detail_permasalahan,
            $pengaduan->status,
            $pengaduan->tanggapan,
            $pengaduan->created_at->format('d-m-Y H:i:s')
        ];
    }
}