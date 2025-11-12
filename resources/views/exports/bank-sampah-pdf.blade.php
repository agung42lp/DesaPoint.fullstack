<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Bank Sampah</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        h2 { color: #333; }
    </style>
</head>
<body>
    <h2>Data Bank Sampah RW Sejahtera</h2>
    <p>Tanggal Export: {{ date('d F Y') }}</p>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Total Sampah</th>
            <th>Total Konversi</th>
            <th>Saldo Cair</th>
            <th>Saldo Tersisa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->total_sampah }} kg</td>
            <td>Rp {{ number_format($item->total_konversi, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($item->saldo_cair, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($item->saldo_tersisa, 0, ',', '.') }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>