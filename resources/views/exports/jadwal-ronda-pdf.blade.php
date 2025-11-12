<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Jadwal Ronda</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        h2 { color: #333; }
    </style>
</head>
<body>
    <h2>Jadwal Ronda RW Sejahtera</h2>
    <p>Tanggal Export: {{ date('d F Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Peserta Ronda</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</td>
                <td>{{ $item->peserta_ronda }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>