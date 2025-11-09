<?php
namespace App\Http\Controllers;

use App\Models\JadwalRonda;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JadwalRondaExport;

class JadwalRondaController extends Controller
{
    public function index()
    {
        return response()->json(JadwalRonda::oldest('tanggal')->get());
    }

    public function export() {
        return Excel::download(new JadwalRondaExport, 'jadwal_ronda.xlsx');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'peserta_ronda' => 'required|string',
        ]);

        return response()->json(JadwalRonda::create($validated), 201);
    }

    public function update(Request $request, JadwalRonda $jadwalRonda)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'peserta_ronda' => 'required|string',
        ]);

        $jadwalRonda->update($validated);
        return response()->json($jadwalRonda);
    }

    public function destroy(JadwalRonda $jadwalRonda)
    {
        $jadwalRonda->delete();
        return response()->json(['message' => 'Deleted']);
    }
}