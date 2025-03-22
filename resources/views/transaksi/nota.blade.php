<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 20px; font-size: 14px; }
        .container { max-width: 400px; margin: auto; padding: 15px; border: 1px solid black; border-radius: 10px; }
        .logo { width: 80px; margin-bottom: 5px; }
        h2 { margin: 5px 0; font-size: 18px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 13px; }
        th, td { border: 1px solid black; padding: 5px; text-align: left; }
        .total { font-size: 16px; font-weight: bold; margin-top: 10px; }
        .btn-print { margin-top: 10px; padding: 8px 12px; background: black; color: white; border: none; cursor: pointer; font-size: 14px; }
        
        @media print {
            .btn-print { display: none; }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Nota Transaksi</h2>
        <hr>
        <p><strong>Kode:</strong> {{ $transaksi->kode_transaksi ?? '-' }}</p>
        <p><strong>Customer:</strong> {{ $transaksi->customer_name ?? '-' }}</p>

        @if (!empty($transaksi->detail) && $transaksi->detail->isNotEmpty())
        <table>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
            @foreach($transaksi->detail as $detail)
            <tr>
                <td>{{ optional($detail->produk)->name ?? 'Produk tidak tersedia' }}</td>
                <td>Rp {{ number_format($detail->harga ?? 0, 0, ',', '.') }}</td>
                <td>{{ $detail->jumlah ?? 0 }}</td>
                <td>Rp {{ number_format($detail->subtotal ?? 0, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </table>
        @else
        <p class="text-danger">Tidak ada produk dalam transaksi ini.</p>
        @endif

        <p class="total">Total: Rp {{ number_format($transaksi->total ?? 0, 0, ',', '.') }}</p>

        <button class="btn-print" onclick="printNota()">Cetak Nota</button>
    </div>

    <script>
        function printNota() {
            window.print();
        }

        // Setelah cetak selesai, kembali ke halaman transaksi
        window.onafterprint = function () {
            window.location.href = "{{ route('transaksi.index') }}";
        };
    </script>

</body>
</html>
