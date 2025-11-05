<?php

namespace App\Http\Controllers;

use App\Models\Baksos;
use Illuminate\Http\Request;

class BaksosController extends Controller
{
    public function index()
    {
        return response()->json(Baksos::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
        ]);

        $baksos = Baksos::create($validated);
        return response()->json($baksos, 201);
    }

    public function update(Request $request, Baksos $baksos)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
        ]);

        $baksos->update($validated);
        return response()->json($baksos);
    }

    public function destroy(Baksos $baksos)
    {
        $baksos->delete();
        return response()->json(['message' => 'Deleted']);
    }
}