@extends('base.base-root-index')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/src/table/datatable/datatables.css">

<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/table/datatable/dt-global_style.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/table/datatable/dt-global_style.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/table/datatable/custom_dt_custom.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/table/datatable/custom_dt_custom.css">
@endsection
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('root') }}/assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>{{ $submenu }}</h2>
        <ol>
          <li><a href="/">Home</a></li>
          <li>{{ $submenu }}</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>{{ $submenu }}</h2>
            <p>Quam sed id excepturi ccusantium dolorem ut quis dolores nisi llum nostrum enim velit qui ut et autem uia reprehenderit sunt deleniti</p>
          </div>

          <div class="row">
            <div class="col-lg-12 col-12 mb-3">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <span style="font-size: 20px">Riwayat Pesanan</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table style-3 dt-table-hover" id="style-3">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Nama Klien</th>
                                        <th>Nama Paket</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Jam Pesanan</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($book as $key => $item)
                                    @if(Auth::user()->id == $item->user_id)
                                    <tr class="text-center align-items-center">
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->paket->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->book_date)->formatLocalized('%A, %d %B %Y') }}</td>
                                        <td>{{ $item->book_time }}</td>
                                        <td>{{ $item->paket->price }}</td>
                                        <td>{{ $item->book_stat }}</td>
                                        <td>
                                            @if($item->book_stat == 'Menunggu Pembayaran')
                                            <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#paymentHere{{$item->id}}"><i class="fa-solid fa-eye"></i></a>
                                            @elseif($item->book_stat == 'Menunggu Verifikasi')
                                            <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#paymentView{{$item->id}}"><i class="fa-solid fa-eye"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @empty
                                    <tr class="text-center">
                                        <td colspan="8">Belum ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>



        </div>
    </section><!-- End Testimonials Section -->

</main><!-- End #main -->
@foreach ($book as $item)
<div class="modal fade" id="paymentHere{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('user.book.product.payment', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header" style="font-size: 20px">
                    <h5 class="modal-title" id="tabsModalLabel">Scan QR Code</h5>
                    <div class="d-flex justify-content-between align-items-center">

                        <button style="margin-right: 5px;" type="submit" class="btn btn-rounded btn-outline-primary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                        <button style="" type="button" class="btn btn-rounded btn-outline-warning" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-close"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group col-12 mb-3 text-center">
                        <img src="{{ asset('storage/images/web/qris.png') }}" alt="" style="max-height: 300px">
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="book_proof">Nilai Harga Pembayaran</label>
                        <input type="text" disabled class="form-control" value="{{ $item->paket->price }}">
                        @error('book_proof') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="book_prof">Bukti Pembayaran</label>
                        <input type="file" name="book_prof" id="book_prof" class="form-control">
                        @error('book_prof') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
@foreach ($book as $item)
@if($item->book_stat == 'Menunggu Verifikasi')
<div class="modal fade" id="paymentView{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('user.book.product.payment', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header align-items-center" style="font-size: 20px">
                    <h5 class="modal-title" id="tabsModalLabel"><span style="font-size: 20px;">Lihat bukti pembayaran</span></h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <button style="" type="button" class="btn btn-rounded btn-outline-warning" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-close"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group col-12 mb-3 text-center">
                        <img src="{{ asset('storage/images/prof/'.$item->book_prof) }}" alt="" style="max-height: 300px">
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="book_proof">Nilai Harga Pembayaran</label>
                        <input type="text" disabled class="form-control" value="{{ $item->paket->price }}">
                        <p class="text-success">Silahkan tunggu konfirmasi dari admin.</p>
                        @error('book_proof') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endif
@endforeach

@endsection
@section('custom-js')
<script src="{{ asset('main') }}/src/plugins/src/table/datatable/datatables.js"></script>

<script>
    c3 = $('#style-3').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
        "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 10
    });

    multiCheck(c3);
</script>
@endsection
