@extends('base.base-root-index')
@section('custom-css')
    <style>
        .btn {
            border-radius: 20px;
        }
    </style>
@endsection
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('root') }}/assets/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center text-center" data-aos="fade">

                <h2>{{ $submenu }}</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>{{ $submenu }}</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Projet Details Section ======= -->
        <section id="project-details" class="project-details">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="position-relative h-100"
                    style="max-width: 560px; margin: 0 auto; text-align: center; display: flex; justify-content: center; align-items: center;">
                    <div class="slides-1 portfolio-details-slider swiper" style="">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $gallery->cover) }}" alt="">
                            </div>
                            @if ($gallery->image_1)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $gallery->image_1) }}" alt="">
                                </div>
                            @endif
                            @if ($gallery->image_2)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $gallery->image_2) }}" alt="">
                                </div>
                            @endif
                            @if ($gallery->image_3)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $gallery->image_3) }}" alt="">
                                </div>
                            @endif
                            @if ($gallery->image_4)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $gallery->image_4) }}" alt="">
                                </div>
                            @endif
                            @if ($gallery->image_5)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $gallery->image_5) }}" alt="">
                                </div>
                            @endif

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>


                <div class="row justify-content-between gy-4 mt-4">

                    <div class="col-lg-8">
                        <div class="portfolio-description">
                            <h2>{{ $gallery->name . (' - ') . $gallery->cpaket->name }}</h2>
                            <p>{{ $gallery->desc }}</p>

                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="portfolio-info">
                            <h3>{{ $gallery->price }}</h3>
                            <ul>
                                <li><strong>Kategori</strong> <span>{{ $gallery->cpaket->name }}</span></li>
                                <li><strong>Pengelola</strong> <span>{{ $gallery->user->name }}</span></li>
                                <li><strong>Ditambahkan Pada</strong>
                                    <span>
                                        {{ \Carbon\Carbon::parse($gallery->created_at)->isoFormat('dddd, D MMMM YYYY') }}
                                    </span>
                                </li>
                                <li><strong>Lihat Portofolio Lain</strong> <a
                                        href="{{ route('root.pages.portofolio') }}">{{ route('root.pages.portofolio') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Projet Details Section -->

    </main><!-- End #main -->


    @include('base.root.root-modal')
@endsection
@section('custom-js')
@endsection
