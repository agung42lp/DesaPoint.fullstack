<?php

namespace App\Http\Controllers;

use App\Models\DanaSosial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\DanaSosialPdfExport;
use Illuminate\Support\Facades\Log;

class DanaSosialController extends Controller
{
    public function index()
    {
        return response()->json(DanaSosial::latest()->get());
    }

  public function exportPdf()
    {
        try {
            $data = DanaSosial::all()->map(function($item) {
                if ($item->foto_penyerahan && file_exists(public_path('storage/' . $item->foto_penyerahan))) {
                    $path = public_path('storage/' . $item->foto_penyerahan);
                    
                    try {
                        $imageContent = file_get_contents($path);
                        $image = @imagecreatefromstring($imageContent);
                        
                        if ($image === false) {
                            \Log::error("Failed to create image from: " . $path);
                            $item->foto_base64 = null;
                            return $item;
                        }
                        
                        $width = imagesx($image);
                        $height = imagesy($image);
                        $newWidth = 200;
                        $newHeight = ($height / $width) * $newWidth;
                        
                        $resized = imagecreatetruecolor($newWidth, $newHeight);
                        imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                        
                        ob_start();
                        imagejpeg($resized, null, 60);
                        $imageData = ob_get_clean();
                        
                        $item->foto_base64 = 'data:image/jpeg;base64,' . base64_encode($imageData);
                        
                        imagedestroy($image);
                        imagedestroy($resized);
                    } catch (\Exception $e) {
                        \Log::error("Image processing error: " . $e->getMessage());
                        $item->foto_base64 = null;
                    }
                } else {
                    $item->foto_base64 = null;
                }
                return $item;
            });
            
            $pdf = Pdf::loadView('exports.dana-sosial-pdf', compact('data'));
            return $pdf->download('dana-sosial-' . date('Y-m-d') . '.pdf');
            
        } catch (\Exception $e) {
            \Log::error('PDF Export Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
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