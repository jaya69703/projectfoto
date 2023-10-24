<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Semua Member</title>
</head>
<body>
    <h1 style="text-align: center">Laporan Data Semua Member</h1>

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
                        <td>{{ ++$key }}</td>
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
