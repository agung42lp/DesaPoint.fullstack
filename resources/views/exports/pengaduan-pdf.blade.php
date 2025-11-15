<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Pengaduan Warga</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 6px; text-align: left; }
        th { background-color: #4CAF50; color: white; font-size: 9px; }
        h2 { color: #333; margin-bottom: 5px; }
        .photo { width: 80px; height: 60px; object-fit: cover; }
        .status { padding: 2px 6px; border-radius: 4px; font-size: 8px; font-weight: bold; }
        .diterima { background: #DBEAFE; color: #1E40AF; }
        .diproses { background: #FEF3C7; color: #92400E; }
        .selesai { background: #D1FAE5; color: #065F46; }
        .ditolak { background: #FEE2E2; color: #991B1B; }
    </style>
</head>
<body>
    <h2>Data Pengaduan Warga RW Sejahtera</h2>
    <p>Tanggal Export: {{ date('d F Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>RT/Rumah</th>
                <th>Kategori</th>
                <th>Judul & Detail</th>
                <th>Foto</th>
                <th>Status</th>
                <th>Tanggapan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                <td>{{ $item->nama_pengirim }}</td>
                <td>RT {{ $item->rt }}/{{ $item->nomor_rumah }}</td>
                <td>{{ $item->kategori }}</td>
                <td>
                    <strong>{{ $item->judul_permasalahan }}</strong><br>
                    <small>{{ Str::limit($item->detail_permasalahan, 100) }}</small>
                </td>
                <td>
                    @if($item->foto_1_base64)
                        <img src="{{ $item->foto_1_base64 }}" class="photo"><br>
                    @endif
                    @if($item->foto_2_base64)
                        <img src="{{ $item->foto_2_base64 }}" class="photo">
                    @endif
                    @if(!$item->foto_1_base64 && !$item->foto_2_base64)
                        -
                    @endif
                </td>
                <td><span class="status {{ $item->status }}">{{ strtoupper($item->status) }}</span></td>
                <td>{{ $item->tanggapan ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>