@if(Auth::user()->type == 'Super Admin')
<div class="row layout-top-spacing mb-3">
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.pending') }}">
            <div class="card btn btn-outline-success">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-cart-shopping" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Pesanan Berhasil <br> {{ App\Models\Booking::where('book_stat', 7)->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.pending') }}">
            <div class="card btn btn-outline-success">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-money-bill-wave" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Balance Income <br>Rp {{ $formattedIncome }}</span>
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
                <div id="chartpenghasilan"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12 mb-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span style="font-size: 20px">Data Semua Transaksi</span>
                <span><a href="{{ route('sadmin.report.download-all', ['format' => 'pdf']) }}" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-print"></i></a></span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Nama Member</th>
                                <th>Tanggal Order</th>
                                <th>Tanggal Take</th>
                                <th>Tanggal Done</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookdone as $key => $item)
                            <tr class="text-center">
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>{{ $item->book_date }}</td>
                                <td>{{ $item->updated_at->diffForHumans() }}</td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="4">Data tidak ditemukan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12 mb-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span style="font-size: 20px">Data Semua Member</span>
                <span>
                    <a href="{{ route('sadmin.report.download-member-all', ['format' => 'pdf']) }}" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-print"></i></a>
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Nama Member</th>
                                <th>Email address</th>
                                <th>Telepon</th>
                                <th>Dibuat Pada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($member as $key => $item)
                            <tr class="text-center">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="4">Data tidak ditemukan</td>
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
