<!DOCTYPE html>
<html>
<head>
    <title>Laporan Daftar Member</title>
</head>
<body>
    @if(Str::is('superadmin/member/filter?month={$month}', request()->path()))
    @php
        setlocale(LC_TIME, 'id_ID'); // Atur lokal ke Bahasa Indonesia
        $date = \Carbon\Carbon::createFromFormat('m', $month); // Buat objek tanggal dari format bulan

        $monthName = $date->format('F'); // Dapatkan nama bulan dalam Bahasa Indonesia
    @endphp
    @endif

    @if(Str::is('superadmin/member/filter?month={$month}', request()->path()))
    <h1 style="text-align: center">Laporan Daftar Member Bulan {{ $monthName }}</h1>
    @else
    <h1 style="text-align: center">Laporan Data Semua Member</h1>
    @endif

    @if($members)
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Member</th>
                    <th>Alamat Email</th>
                    <th>Nomor Telepon</th>
                    <th>Waktu Daftar</th>
                </tr>
            </thead>
            <tbody>

                @foreach($members as $key => $item)
                    <tr class="text-center">
                        <td style="text-align:center;">{{ ++$key }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM YYYY') }}</td>
                    </tr>
                @endforeach
                <tr class="text-center">
                    <td colspan="4">Jumlah Member Bulan Ini</td>
                    <td colspan="1">{{ $newMember }} Member</td>
                </tr>
            </tbody>
        </table>
    @else
        <p>Tidak ada data member.</p>
    @endif
    <p>Total Penambahan Member Baru: {{ $newMember }}</p>
</body>
</html>
