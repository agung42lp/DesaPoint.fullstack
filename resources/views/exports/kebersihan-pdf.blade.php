<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Program Kebersihan</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2 { color: #333; text-align: center; }
        .header { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        .status { padding: 4px 8px; border-radius: 4px; font-size: 10px; font-weight: bold; }
        .status-upcoming { background-color: #3B82F6; color: white; }
        .status-thisweek { background-color: #EF4444; color: white; }
        .status-completed { background-color: #10B981; color: white; }
        .image-cell { text-align: center; }
        .image-cell img { max-width: 100px; height: auto; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Data Program Kebersihan RW Sejahtera</h2>
        <p>Tanggal Export: {{ date('d F Y') }}</p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Judul Program</th>
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
                <td class="image-cell">
                    @if($item->image_base64)
                        <img src="{{ $item->image_base64 }}" alt="Foto">
                    @else
                        <span style="color: #999;">Tidak ada foto</span>
                    @endif
                </td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->time }}</td>
                <td>{{ $item->location }}</td>
                <td>
                    @if($item->status === 'completed')
                        <span class="status status-completed">Selesai</span>
                    @elseif($item->status === 'thisweek')
                        <span class="status status-thisweek">Minggu Ini</span>
                    @else
                        <span class="status status-upcoming">Akan Datang</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>