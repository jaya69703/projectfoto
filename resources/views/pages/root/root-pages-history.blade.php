@extends('base.base-root-index')
@section('custom-css')

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
                        <span style="font-size: 20px">Booking History</span>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Package Name</th>
                                    <th>Booking Date</th>
                                    <th>Booking Time</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($book as $key => $item)
                                <tr class="text-center align-items-center">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->paket->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->book_date)->formatLocalized('%A, %d %B %Y') }}</td>
                                    <td>{{ $item->book_time }}</td>
                                    <td>{{ $item->paket->price }}</td>
                                    <td>{{ $item->book_stat }}</td>
                                    <td>
                                        <a href="{{ route('user.book.history.show', $item->id) }}" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
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
      </section><!-- End Testimonials Section -->

  </main><!-- End #main -->

@endsection
@section('custom-js')

@endsection
