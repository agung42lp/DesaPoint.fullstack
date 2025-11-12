<?php

namespace App\Http\Controllers;

use App\Models\Kebersihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\KebersihanPdfExport;

class KebersihanController extends Controller
{
    public function index()
    {
        $data = Kebersihan::orderBy('created_at', 'desc')->get();
        return response()->json($data);
    }

    public function exportPdf()
    {
        $data = Kebersihan::all()->map(function($item) {
            if ($item->image && file_exists(public_path('storage/' . $item->image))) {
                $path = public_path('storage/' . $item->image);
                
                $image = imagecreatefromstring(file_get_contents($path));
                
                $width = imagesx($image);
                $height = imagesy($image);
                $newWidth = 200;
                $newHeight = ($height / $width) * $newWidth;
                
                $resized = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                
                ob_start();
                imagejpeg($resized, null, 60);
                $imageData = ob_get_clean();
                
                $item->image_base64 = 'data:image/jpeg;base64,' . base64_encode($imageData);
                
                imagedestroy($image);
                imagedestroy($resized);
            } else {
                $item->image_base64 = null;
            }
            return $item;
        });
        
        $pdf = Pdf::loadView('exports.kebersihan-pdf', compact('data'));
        return $pdf->download('kebersihan-' . date('Y-m-d') . '.pdf');
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