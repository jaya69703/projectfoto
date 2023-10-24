<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Semua Transaksi</title>
</head>
<body>

    <h1 style="text-align: center">Laporan Data Semua Transaksi</h1>

    @if($transaksi)
        <table border="1">
            <thead>
                <tr style="text-align:center;">
                    <th>ID</th>
                    <th>Nama Member</th>
                    <th>Nama Paket</th>
                    <th>Harga Paket</th>
                    <th>Tanggal Order</th>
                    <th>Tanggal Take</th>
                    <th>Tanggal Done</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                @foreach($transaksi as $item)
                    <tr style="text-align:center;">
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->paket->name }}</td>
                        <td>{{ $item->paket->price }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM YYYY') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->book_date)->isoFormat('dddd, D MMMM YYYY') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->updated_at)->isoFormat('dddd, D MMMM YYYY') }}</td>
                        <td>{{ $item->book_stat }}</td>
                    </tr>
                @endforeach
                <tr class="text-center">
                    <td colspan="5">Total Penghasilan Bulan Ini</td>
                    <td colspan="3">{{ $income }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <p>Tidak ada data transaksi.</p>
    @endif
    <p>Total Pendapatan: {{ $income }}</p>
</body>
</html>
