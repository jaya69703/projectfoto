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
            <p>Berisi tentang halaman {{ $submenu }} kami</p>
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
                        <h1>Syarat dan Ketentuan Penggunaan</h1>
                        <p>Selamat datang di layanan sistem jasa pemesanan fotografi kami. Dengan menggunakan layanan kami, Anda menyetujui dan tunduk pada syarat dan ketentuan penggunaan ini. Harap baca dengan teliti sebelum menggunakan layanan kami.</p>

                        <h2>Persetujuan Pengguna</h2>
                        <p>Dengan menggunakan layanan kami, Anda menegaskan bahwa Anda memahami dan menyetujui untuk mematuhi persyaratan dan ketentuan ini. Jika Anda tidak setuju dengan ketentuan ini, harap jangan gunakan layanan kami.</p>

                        <h2>Batasan Penggunaan</h2>
                        <p>Anda setuju untuk menggunakan layanan kami hanya untuk tujuan yang sah dan sesuai dengan semua hukum dan peraturan yang berlaku. Anda juga setuju untuk tidak melakukan tindakan yang dapat merusak, mengganggu, atau membatasi fungsionalitas layanan kami.</p>

                        <h2>Perubahan pada Layanan</h2>
                        <p>Kami berhak untuk mengubah atau menghentikan layanan kami setiap saat tanpa pemberitahuan sebelumnya. Kami tidak akan bertanggung jawab kepada Anda atau pihak ketiga atas modifikasi, penangguhan, atau penghentian layanan kami.</p>

                        <h2>Hak Kekayaan Intelektual</h2>
                        <p>Semua materi atau konten yang terdapat dalam layanan kami, termasuk namun tidak terbatas pada teks, grafik, logo, ikon, gambar, dan perangkat lunak, adalah milik atau dilisensikan kepada kami dan dilindungi oleh hukum kekayaan intelektual yang berlaku.</p>

                        <h2>Pelarangan Jaminan</h2>
                        <p>Layanan kami disediakan "apa adanya" tanpa jaminan apa pun, baik tersurat maupun tersirat. Kami tidak memberikan jaminan atau representasi terkait dengan keakuratan atau ketersediaan layanan, keamanan, keandalan, ketepatan waktu, atau kinerja layanan kami.</p>

                        <h2>Penyelesaian Sengketa</h2>
                        <p>Semua perselisihan yang timbul dari atau terkait dengan penggunaan layanan kami akan diselesaikan secara damai. Anda setuju untuk menyelesaikan sengketa tersebut melalui mediasi atau negosiasi yang baik antara kedua belah pihak.</p>

                        <h2>Ketentuan Tambahan</h2>
                        <p>Ketentuan tambahan atau kebijakan lain yang terkait dengan layanan kami dapat diterapkan. Dengan menggunakan layanan kami, Anda juga menyetujui ketentuan-ketentuan tersebut.</p>

                        <p>Jika Anda memiliki pertanyaan lebih lanjut tentang Syarat dan Ketentuan Penggunaan kami, jangan ragu untuk menghubungi kami melalui halaman kontak kami.</p>
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
