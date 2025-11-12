<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Dana Sosial</title>
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
    <h2>Data Dana Sosial RW Sejahtera</h2>
    <p>Tanggal Export: {{ date('d F Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Nominal</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_penerima }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_penyerahan)->format('d F Y') }}</td>
                <td>
                    @if($item->kategori_bantuan === 'korban_meninggal')
                        Korban Meninggal
                    @elseif($item->kategori_bantuan === 'penderita_sakit')
                        Penderita Sakit
                    @else
                        Korban Bencana
                    @endif
                </td>
                <td>Rp {{ number_format($item->nominal_bantuan, 0, ',', '.') }}</td>
                <td>
                    @if($item->foto_base64)
                        <img src="{{ $item->foto_base64 }}" class="photo">
                    @else
                        Tidak ada foto
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>