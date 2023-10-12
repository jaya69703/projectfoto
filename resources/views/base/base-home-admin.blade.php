@if(Auth::user()->type == 'Admin')
<div class="row layout-top-spacing">
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.pending') }}">
            <div class="card btn btn-outline-danger">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-money-bill-wave" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Menunggu Pembayaran <br> {{ App\Models\Booking::where('book_stat', '0')->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.verify') }}">
            <div class="card btn btn-outline-warning">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-business-time" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Menunggu Verifikasi <br> {{ App\Models\Booking::where('book_stat', '1')->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.all') }}">
            <div class="card btn btn-outline-success">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-circle-check" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Verifikasi Berhasil <br> {{ App\Models\Booking::where('book_stat', '2')->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.all') }}">
            <div class="card btn btn-outline-danger">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-circle-xmark" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Verifikasi Tidak Berhasil <br> {{ App\Models\Booking::where('book_stat', '3')->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.all') }}">
            <div class="card btn btn-outline-primary">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-calendar-xmark" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Menunggu Penjadwalan <br> {{ App\Models\Booking::where('book_stat', '4')->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.all') }}">
            <div class="card btn btn-outline-success">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-bars-progress" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Sedang Foto Shoot <br> {{ App\Models\Booking::where('book_stat', '5')->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.all') }}">
            <div class="card btn btn-outline-success">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-square-pen" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Tahap Editing Foto <br> {{ App\Models\Booking::where('book_stat', '6')->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.all') }}">
            <div class="card btn btn-outline-success">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-square-check" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Sudah Selesai di Upload <br> {{ App\Models\Booking::where('book_stat', '7')->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.usermanage.member') }}">
            <div class="card btn btn-outline-danger">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-user" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Member <br> {{ App\Models\User::where('type', 0)->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.usermanage.memberplus') }}">
            <div class="card btn btn-outline-warning">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-user-plus" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Member Plus <br>{{ App\Models\User::where('type', 1)->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.usermanage.author') }}">
            <div class="card btn btn-outline-secondary">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-user-pen" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Author <br> {{ App\Models\User::where('type', 2)->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.usermanage.admin') }}">
            <div class="card btn btn-outline-primary">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-user-shield" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Admin <br> {{ App\Models\User::where('type', 3)->count() }}</span>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row layout-top-spacing">
    <div class="col-lg-8 col-12 mb-2">
        <div class="card">
            <div class="card-header">
                <span style="font-size: 20px">Grafik Pemesanan</span>
            </div>
            <div class="card-body">
                <div id="chartpenjualan"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12 mb-2">
        <div class="card">
            <div class="card-header">
                <span style="font-size: 20px">Sesi Foto Hari Ini</span>
            </div>
            <div class="card-body">
                <div class="">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Nama Klien</th>
                                <th>Waktu Foto</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookday as $key => $item)
                            <tr class="text-center">
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->book_time }}</td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="2">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endif
