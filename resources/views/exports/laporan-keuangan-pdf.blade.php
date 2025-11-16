<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Keuangan RW</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 6px; text-align: left; }
        th { background-color: #16a34a; color: white; font-size: 9px; }
        h2 { color: #333; margin-bottom: 5px; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .debit { color: #dc2626; font-weight: bold; }
        .kredit { color: #16a34a; font-weight: bold; }
        .saldo-positive { color: #16a34a; font-weight: bold; }
        .saldo-negative { color: #dc2626; font-weight: bold; }
        .summary { background-color: #f3f4f6; padding: 10px; margin-top: 20px; border-radius: 5px; }
        .summary-item { display: inline-block; margin-right: 30px; }
    </style>
</head>
<body>
    <h2>Laporan Keuangan RW Sejahtera</h2>
    <p>Tanggal Export: {{ date('d F Y') }}</p>
    
    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th class="text-right">Debit (Rp)</th>
                <th class="text-right">Kredit (Rp)</th>
                <th class="text-right">Saldo (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $item)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                <td>{{ $item->keterangan }}</td>
                <td class="text-right">
                    @if($item->debit > 0)
                        <span class="debit">{{ number_format($item->debit, 0, ',', '.') }}</span>
                    @else
                        -
                    @endif
                </td>
                <td class="text-right">
                    @if($item->kredit > 0)
                        <span class="kredit">{{ number_format($item->kredit, 0, ',', '.') }}</span>
                    @else
                        -
                    @endif
                </td>
                <td class="text-right">
                    <span class="{{ $item->saldo >= 0 ? 'saldo-positive' : 'saldo-negative' }}">
                        {{ number_format($item->saldo, 0, ',', '.') }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="summary">
        <div class="summary-item">
            <strong>Total Pemasukan:</strong> 
            <span class="kredit">Rp {{ number_format($totalDebit, 0, ',', '.') }}</span>
        </div>
        <div class="summary-item">
            <strong>Total Pengeluaran:</strong> 
            <span class="debit">Rp {{ number_format($totalKredit, 0, ',', '.') }}</span>
        </div>
        <div class="summary-item">
            <strong>Saldo Akhir:</strong> 
            <span class="{{ $saldoAkhir >= 0 ? 'saldo-positive' : 'saldo-negative' }}">
                Rp {{ number_format($saldoAkhir, 0, ',', '.') }}
            </span>
        </div>
    </div>
</body>
</html>