<!DOCTYPE html>
<html>
<head>
        <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; }
        th { background-color: #eee; }

        .title {
            font-weight: bold;
            font-size: 36px;       /* Ukuran besar */
            text-align: center;    /* Tengah horizontal */
            margin-bottom: 20px;
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="title">KeuanganKu</div> 
    <h2>Laporan Transaksi Bulan {{ $bulan }}/{{ $tahun }}</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $t)
                <tr>
                    <td>{{ $t->nama }}</td>
                    <td>{{ $t->kategori?->nama ?? '-' }}</td>  <!-- cek kategori null-safe -->
                    <td>{{ \Carbon\Carbon::parse($t->tanggal)->format('d-m-Y') }}</td>
                    <td>Rp{{ number_format($t->jumlah, 0, ',', '.') }}</td>
                    <td>{{ $t->catatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
