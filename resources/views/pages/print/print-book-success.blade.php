<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
</head>
<body>
    @php
        setlocale(LC_TIME, 'id_ID'); // Atur lokal ke Bahasa Indonesia
        $date = \Carbon\Carbon::createFromFormat('m', $month); // Buat objek tanggal dari format bulan

        $monthName = $date->format('F'); // Dapatkan nama bulan dalam Bahasa Indonesia
    @endphp

    <h1>Laporan Transaksi Bulan {{ $monthName }}</h1>

    @if($transaksi)
        <table border="1">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
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
                    <tr class="text-center">
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
