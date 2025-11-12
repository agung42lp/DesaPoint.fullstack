<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Program Kebersihan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        h2 { color: #333; }
        .photo { width: 60px; height: 60px; object-fit: cover; }
    </style>
</head>
<body>
    <h2>Program Kebersihan RW Sejahtera</h2>
    <p>Tanggal Export: {{ date('d F Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if($item->image_base64)
                        <img src="{{ $item->image_base64 }}" class="photo">
                    @else
                        Tidak ada foto
                    @endif
                </td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->time }}</td>
                <td>{{ $item->location }}</td>
                <td>
                    @if($item->status === 'completed')
                        Selesai
                    @elseif($item->status === 'thisweek')
                        Minggu Ini
                    @else
                        Akan Datang
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>