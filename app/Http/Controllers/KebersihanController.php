<?php

namespace App\Http\Controllers;

use App\Models\Kebersihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class KebersihanController extends Controller
{
    public function index()
    {
        $data = Kebersihan::all()
            ->sortBy(function($item) {
                return $this->parseIndonesianDate($item->date);
            })
            ->values();
        
        return response()->json($data);
    }

    public function exportPdf()
    {
        $data = Kebersihan::all()
            ->sortBy(function($item) {
                return $this->parseIndonesianDate($item->date);
            })
            ->map(function($item) {
                if ($item->image && file_exists(public_path('storage/' . $item->image))) {
                    try {
                        $item->image_base64 = $this->processImageForPdf(public_path('storage/' . $item->image));
                    } catch (\Exception $e) {
                        Log::error('Error processing image: ' . $e->getMessage());
                        $item->image_base64 = null;
                    }
                } else {
                    $item->image_base64 = null;
                }
                return $item;
            });
        
        $pdf = Pdf::loadView('exports.kebersihan-pdf', compact('data'));
        return $pdf->download('kebersihan-' . date('Y-m-d') . '.pdf');
    }
    
    private function parseIndonesianDate($dateString)
    {
        $months = [
            'Januari' => '01', 'Februari' => '02', 'Maret' => '03',
            'April' => '04', 'Mei' => '05', 'Juni' => '06',
            'Juli' => '07', 'Agustus' => '08', 'September' => '09',
            'Oktober' => '10', 'November' => '11', 'Desember' => '12'
        ];
        
        $parts = explode(',', $dateString);
        if (count($parts) < 2) return now();
        
        $datePart = trim($parts[1]);
        $dateArray = explode(' ', $datePart);
        
        if (count($dateArray) < 3) return now();
        
        $day = str_pad($dateArray[0], 2, '0', STR_PAD_LEFT);
        $month = $months[$dateArray[1]] ?? '01';
        $year = $dateArray[2];
        
        return "$year-$month-$day";
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