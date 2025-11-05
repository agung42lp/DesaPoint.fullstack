<?php

namespace App\Http\Controllers;

use App\Models\BankSampah;
use Illuminate\Http\Request;

class BankSampahController extends Controller
{
    public function index()
    {
        return response()->json(BankSampah::oldest()->get());
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'total_sampah' => 'required|numeric|min:0',
                'total_uang' => 'required|numeric|min:0',
            ]);

            $result = BankSampah::create($validated);
            return response()->json($result, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, BankSampah $bankSampah)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'total_sampah' => 'required|numeric|min:0',
            'total_uang' => 'required|numeric|min:0',
        ]);

        $bankSampah->update($validated);
        return response()->json($bankSampah);
    }

    public function destroy(BankSampah $bankSampah)
    {
        $bankSampah->delete();
        return response()->json(['message' => 'Deleted']);
    }
}