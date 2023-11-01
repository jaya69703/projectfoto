@extends('base.base-root-index')
@section('custom-css')
@endsection
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('root') }}/assets/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>{{ $submenu }}</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>{{ $submenu }}</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Our Projects Section ======= -->
        <section id="projects" class="projects">
            <div class="container" data-aos="fade-up">


                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">
                    <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="" class=""><a href="/pricing">All</a></li>
                        <li data-filter=".{{ $cpaket->slug }}" class="{{ Str::is('paket/category/'.$cpaket->slug, request()->path()) ? 'filter-active' : ''  }}">{{ $cpaket->name }}</li>
                        {{-- @foreach ($cpaket as $item)
                        <li data-filter=".{{ $item->slug }}" class="{{ Str::is('paket/category/'.$item->slug, request()->path()) == Str::is('paket/category/'.$cpaket->slug, request()->path()) ? 'filter-active' : ''  }}">{{ $item->name }}</li>

                        @endforeach --}}
                    </ul><!-- End Projects Filters -->

                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($cpaket->paket as $item)
                            <div class="col-lg-4 col-md-6 portfolio-item {{ $item->cpaket->slug }}">
                                <div class="portfolio-content h-100">
                                    <img src="{{ asset('storage/images/paket/' . $item->image) }}" class="img-fluid"
                                        alt="">
                                    <div class="portfolio-info">
                                        <h4>{{ $item->cpaket->name }}</h4>
                                        <p>{{ $item->name }}</p>
                                        <a href="{{ asset('storage/images/paket/' . $item->image) }}"
                                            title="{{ $item->description }}"
                                            data-gallery="portfolio-gallery-{{ $item->cpaket->slug }}"
                                            class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                        <a href="{{ route('root.pages.package.show', $item->slug) }}" title="More Details"
                                            class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div><!-- End Projects Item -->
                        @endforeach
                    </div><!-- End Projects Container -->
                </div>
            </div>
        </section><!-- End Our Projects Section -->

    </main><!-- End #main -->
@endsection
@section('custom-js')
@endsection
