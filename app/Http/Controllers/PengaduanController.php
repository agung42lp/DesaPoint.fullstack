<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

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

    public function exportPdf()
    {
        $data = Pengaduan::all()->map(function($item) {
            if ($item->foto_1 && file_exists(public_path('storage/' . $item->foto_1))) {
                try {
                    $item->foto_1_base64 = $this->processImageForPdf(public_path('storage/' . $item->foto_1));
                } catch (\Exception $e) {
                    Log::error('Error processing foto_1: ' . $e->getMessage());
                    $item->foto_1_base64 = null;
                }
            } else {
                $item->foto_1_base64 = null;
            }
            
            if ($item->foto_2 && file_exists(public_path('storage/' . $item->foto_2))) {
                try {
                    $item->foto_2_base64 = $this->processImageForPdf(public_path('storage/' . $item->foto_2));
                } catch (\Exception $e) {
                    Log::error('Error processing foto_2: ' . $e->getMessage());
                    $item->foto_2_base64 = null;
                }
            } else {
                $item->foto_2_base64 = null;
            }
            
            return $item;
        });
        
        $pdf = Pdf::loadView('exports.pengaduan-pdf', compact('data'));
        return $pdf->download('pengaduan-' . date('Y-m-d') . '.pdf');
    }

    private function processImageForPdf($path)
    {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        
        if ($extension === 'png') {
            $image = @imagecreatefrompng($path);
        } else {
            switch ($extension) {
                case 'jpg':
                case 'jpeg':
                    $image = imagecreatefromjpeg($path);
                    break;
                case 'webp':
                    $image = function_exists('imagecreatefromwebp') 
                        ? imagecreatefromwebp($path) 
                        : imagecreatefromstring(file_get_contents($path));
                    break;
                default:
                    $image = imagecreatefromstring(file_get_contents($path));
            }
        }
        
        if (!$image) {
            throw new \Exception('Cannot create image from file');
        }
        
        $width = imagesx($image);
        $height = imagesy($image);
        $newWidth = 200; 
        $newHeight = (int)(($height / $width) * $newWidth);
        
        $resized = imagecreatetruecolor($newWidth, $newHeight);
        
        if (in_array($extension, ['png', 'webp'])) {
            $white = imagecolorallocate($resized, 255, 255, 255);
            imagefilledrectangle($resized, 0, 0, $newWidth, $newHeight, $white);
        }
        
        imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        
        ob_start();
        imagejpeg($resized, null, 75); 
        $resizedData = ob_get_clean();
        
        imagedestroy($image);
        imagedestroy($resized);
        
        return 'data:image/jpeg;base64,' . base64_encode($resizedData);
    }

    public function store(Request $request)
    {
        Log::info('=== START UPLOAD DEBUG ===');
        Log::info('Request files:', $request->allFiles());
        
        $request->validate([
            'rt' => 'required|string',
            'nomor_rumah' => 'required|string',
            'no_hp' => 'required|string',
            'judul_permasalahan' => 'required|string',
            'kategori' => 'required|string',
            'detail_permasalahan' => 'required|string',
            'foto_1' => 'required|image|max:5120',
            'foto_2' => 'nullable|image|max:5120',
        ]);

        $data = [
            'user_id' => $request->user()->id, 
            'nama_pengirim' => $request->user()->name, 
            'rt' => $request->rt,
            'nomor_rumah' => $request->nomor_rumah,
            'no_hp' => $request->no_hp,
            'judul_permasalahan' => $request->judul_permasalahan,
            'kategori' => $request->kategori,
            'detail_permasalahan' => $request->detail_permasalahan,
            'status' => 'diterima'
        ];

        if ($request->hasFile('foto_1')) {
            $foto1 = $request->file('foto_1');
            $filename1 = time() . '_1.' . $foto1->getClientOriginalExtension();
            
            Log::info('Foto 1:', [
                'filename' => $filename1,
                'size' => $foto1->getSize(),
                'mime' => $foto1->getMimeType()
            ]);
            
            $path1 = $foto1->storeAs('pengaduan', $filename1, 'public');
            Log::info('Foto 1 stored at:', ['path' => $path1]);
            
            $data['foto_1'] = 'pengaduan/' . $filename1;
            Log::info('Foto 1 will be saved to DB as:', ['foto_1' => $data['foto_1']]);
        }

        if ($request->hasFile('foto_2')) {
            $foto2 = $request->file('foto_2');
            $filename2 = time() . '_2.' . $foto2->getClientOriginalExtension();
            
            Log::info('Foto 2:', [
                'filename' => $filename2,
                'size' => $foto2->getSize(),
                'mime' => $foto2->getMimeType()
            ]);
            
            $path2 = $foto2->storeAs('pengaduan', $filename2, 'public');
            Log::info('Foto 2 stored at:', ['path' => $path2]);
            
            $data['foto_2'] = 'pengaduan/' . $filename2;
            Log::info('Foto 2 will be saved to DB as:', ['foto_2' => $data['foto_2']]);
        }

        Log::info('Data before create:', $data);
        
        $pengaduan = Pengaduan::create($data);
        
        Log::info('Data after create:', $pengaduan->toArray());
        
        $fullPath1 = storage_path('app/public/pengaduan/' . (time() . '_1.jpg'));
        Log::info('File exists?', [
            'path' => $fullPath1,
            'exists' => file_exists($fullPath1)
        ]);

        return response()->json([
            'message' => 'Pengaduan berhasil dibuat',
            'data' => $pengaduan
        ], 201);
    }

    public function myPengaduan(Request $request)
    {
        $pengaduan = Pengaduan::where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return response()->json($pengaduan);
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