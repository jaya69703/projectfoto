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
            <p>Berisi tentang halaman Kebijakan Privasi kami</p>
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
                    <div class="card-body">
                        <h1>Kebijakan Privasi</h1>
                        <p>Terima kasih telah menggunakan layanan sistem jasa pemesanan fotografi kami. Kami sangat memperhatikan privasi Anda dan berkomitmen untuk melindungi informasi pribadi Anda. Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda dalam penggunaan layanan kami.</p>

                        <h2>Informasi yang Kami Kumpulkan</h2>
                        <p>Kami dapat mengumpulkan informasi pribadi seperti nama, alamat, nomor telepon, alamat email, serta detail acara atau proyek fotografi yang Anda pesan. Informasi ini diperlukan untuk memproses dan menyediakan layanan pemesanan fotografi yang Anda inginkan.</p>

                        <h2>Penggunaan Informasi</h2>
                        <p>Informasi yang kami kumpulkan digunakan untuk memfasilitasi proses pemesanan, menghubungi Anda terkait detail layanan, memahami kebutuhan Anda, dan meningkatkan layanan kami. Kami tidak akan membagikan informasi pribadi Anda kepada pihak ketiga tanpa izin Anda, kecuali diperlukan untuk memenuhi permintaan Anda.</p>

                        <h2>Keamanan Informasi</h2>
                        <p>Kami mengimplementasikan langkah-langkah keamanan teknis dan organisasi untuk melindungi informasi pribadi Anda dari akses yang tidak sah, perubahan, pengungkapan, atau penghapusan yang tidak sah. Kami berkomitmen untuk menjaga kerahasiaan informasi Anda sebaik mungkin.</p>

                        <h2>Perubahan Kebijakan Privasi</h2>
                        <p>Kami dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu. Perubahan akan segera diumumkan pada halaman ini. Kami menyarankan Anda untuk memeriksa halaman ini secara berkala untuk mengetahui perubahan apa pun. Dengan tetap menggunakan layanan kami, Anda setuju dengan Kebijakan Privasi kami.</p>

                        <p>Jika Anda memiliki pertanyaan lebih lanjut tentang Kebijakan Privasi kami, jangan ragu untuk menghubungi kami melalui halaman kontak kami.</p>
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
