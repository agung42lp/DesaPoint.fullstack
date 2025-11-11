<?php

namespace App\Http\Controllers;

use App\Models\DanaSosial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DanaSosialExport;

class DanaSosialController extends Controller
{
    public function index()
    {
        return response()->json(DanaSosial::latest()->get());
    }

     public function export() {
        return Excel::download(new DanaSosialExport, 'dana_sosial.xlsx');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'tanggal_penyerahan' => 'required|date',
            'kategori_bantuan' => 'required|in:korban_meninggal,penderita_sakit,korban_bencana',
            'nominal_bantuan' => 'required|numeric|min:0',
            'foto_penyerahan' => 'required|image|mimes:jpeg,png,jpg|max:5120'
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_penyerahan')) {
            $fotoPath = $request->file('foto_penyerahan')->store('dana-sosial', 'public');
        }

        $danaSosial = DanaSosial::create([
            'nama_penerima' => $validated['nama_penerima'],
            'tanggal_penyerahan' => $validated['tanggal_penyerahan'],
            'kategori_bantuan' => $validated['kategori_bantuan'],
            'nominal_bantuan' => $validated['nominal_bantuan'],
            'foto_penyerahan' => $fotoPath
        ]);

        return response()->json($danaSosial, 201);
    }

    public function update(Request $request, DanaSosial $danaSosial)
    {
        $validated = $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'tanggal_penyerahan' => 'required|date',
            'kategori_bantuan' => 'required|in:korban_meninggal,penderita_sakit,korban_bencana',
            'nominal_bantuan' => 'required|numeric|min:0',
            'foto_penyerahan' => 'nullable|image|mimes:jpeg,png,jpg|max:5120'
        ]);

        $fotoPath = $danaSosial->foto_penyerahan;
        
        if ($request->hasFile('foto_penyerahan')) {
            if ($fotoPath && Storage::disk('public')->exists($fotoPath)) {
                Storage::disk('public')->delete($fotoPath);
            }
            $fotoPath = $request->file('foto_penyerahan')->store('dana-sosial', 'public');
        }

        $danaSosial->update([
            'nama_penerima' => $validated['nama_penerima'],
            'tanggal_penyerahan' => $validated['tanggal_penyerahan'],
            'kategori_bantuan' => $validated['kategori_bantuan'],
            'nominal_bantuan' => $validated['nominal_bantuan'],
            'foto_penyerahan' => $fotoPath
        ]);

        return response()->json($danaSosial);
    }

    public function destroy(DanaSosial $danaSosial)
    {
        if ($danaSosial->foto_penyerahan && Storage::disk('public')->exists($danaSosial->foto_penyerahan)) {
            Storage::disk('public')->delete($danaSosial->foto_penyerahan);
        }
        
        $danaSosial->delete();
        return response()->json(['message' => 'Deleted']);
    }
}