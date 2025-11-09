<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengaduanExport;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengaduan::query();
        
        if ($request->has('search')) {
            $query->where('judul_permasalahan', 'like', '%' . $request->search . '%');
        }
        
        if ($request->has('kategori') && $request->kategori !== '') {
            $query->where('kategori', $request->kategori);
        }
        
        return response()->json($query->latest()->get());
    }

    public function export() {
        return Excel::download(new PengaduanExport, 'pengaduan.xlsx');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pengirim' => 'required',
            'rt' => 'required',
            'nomor_rumah' => 'required',
            'no_hp' => 'required',
            'judul_permasalahan' => 'required',
            'kategori' => 'required|in:Infrastruktur,Kebersihan,Keamanan,Pelayanan,Lainnya',
            'detail_permasalahan' => 'required',
            'foto_1' => 'nullable|image|max:5120',
            'foto_2' => 'nullable|image|max:5120',
        ]);

        if (!Storage::disk('public')->exists('pengaduan')) {
            Storage::disk('public')->makeDirectory('pengaduan');
        }

        if ($request->hasFile('foto_1')) {
            $validated['foto_1'] = $request->file('foto_1')->store('pengaduan', 'public');
        }
        
        if ($request->hasFile('foto_2')) {
            $validated['foto_2'] = $request->file('foto_2')->store('pengaduan', 'public');
        }

        $pengaduan = Pengaduan::create($validated);
        
        return response()->json($pengaduan, 201);
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $validated = $request->validate([
            'status' => 'required|in:diterima,diproses,selesai,ditolak',
            'tanggapan' => 'nullable|string'
        ]);

        $pengaduan->update($validated);
        return response()->json($pengaduan);
    }
}