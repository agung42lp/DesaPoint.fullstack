<?php

namespace App\Http\Controllers;

use App\Models\Kebersihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KebersihanController extends Controller
{
    public function index()
    {
        $data = Kebersihan::orderBy('created_at', 'desc')->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|string',
            'time' => 'required|string',
            'location' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'status' => 'required|in:upcoming,thisweek,completed'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('kebersihan', 'public');
        }

        $kebersihan = Kebersihan::create([
            'title' => $request->title,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
            'image' => $imagePath,
            'status' => $request->status
        ]);

        return response()->json($kebersihan, 201);
    }

    public function update(Request $request, Kebersihan $kebersihan)
    {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|string',
            'time' => 'required|string',
            'location' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'status' => 'required|in:upcoming,thisweek,completed'
        ]);

        $imagePath = $kebersihan->image;
        
        if ($request->hasFile('image')) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('kebersihan', 'public');
        }

        $kebersihan->update([
            'title' => $request->title,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
            'image' => $imagePath,
            'status' => $request->status
        ]);

        return response()->json($kebersihan);
    }

    public function destroy(Kebersihan $kebersihan)
    {
        if ($kebersihan->image && Storage::disk('public')->exists($kebersihan->image)) {
            Storage::disk('public')->delete($kebersihan->image);
        }
        
        $kebersihan->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}