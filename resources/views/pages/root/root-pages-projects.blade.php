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



                @php
                    $currentCategory = last(explode('/', request()->url())); // Ambil bagian terakhir dari URL sebagai kategori saat ini
                @endphp

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">

                    @if (Illuminate\Support\Str::is('paket/category/*', request()->url()))
                        <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                            @php
                                $used_names = [];
                            @endphp
                            @foreach ($paket as $item)
                                @if (!in_array($item->cpaket->name, $used_names))
                                    @php
                                        $used_names[] = $item->cpaket->name;
                                    @endphp
                                    @if ($loop->first)
                                        <li data-filter="*" @if ($currentCategory == 'category') class="filter-active" @endif>
                                            Semua</li>
                                    @endif
                                    <li data-filter=".{{ $item->cpaket->slug }}"
                                        @if ($currentCategory == $item->cpaket->slug) class="filter-active" @endif>
                                        {{ $item->cpaket->name }}</li>
                                @endif
                            @endforeach

                            <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                                @foreach ($paket as $item)
                                    @if ($currentCategory == 'category' || $currentCategory == $item->cpaket->slug || $currentCategory == 'Semua')
                                        <div class="col-lg-4 col-md-6 portfolio-item {{ $item->cpaket->slug }}">
                                            <div class="portfolio-content h-100">
                                                <img src="{{ asset('storage/images/paket/' . $item->image) }}"
                                                    class="img-fluid" alt="">
                                                <div class="portfolio-info">
                                                    <h4>{{ $item->cpaket->name }}</h4>
                                                    <p>{{ $item->name }}</p>
                                                    <a href="{{ asset('storage/images/paket/' . $item->image) }}"
                                                        title="{{ $item->description }}"
                                                        data-gallery="portfolio-gallery-{{ $item->cpaket->slug }}"
                                                        class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                    <a href="{{ route('root.pages.package.show', $item->slug) }}"
                                                        title="Lebih Lanjut" class="details-link"><i
                                                            class="bi bi-link-45deg"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div><!-- End Projects Container -->

                        </ul><!-- End Projects Filters -->
                    @else
                        <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach ($cpaket as $item)
                                <li data-filter=".{{ $item->slug }}">{{ $item->name }}</li>
                            @endforeach
                        </ul><!-- End Projects Filters -->

                        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                            @foreach ($paket as $item)
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
                                            <a href="{{ route('root.pages.package.show', $item->slug) }}"
                                                title="More Details" class="details-link"><i
                                                    class="bi bi-link-45deg"></i></a>
                                        </div>
                                    </div>
                                </div><!-- End Projects Item -->
                            @endforeach

                            @if ($paket)
                            @endif



                        </div><!-- End Projects Container -->
                    @endif
                </div>







            </div>
        </section><!-- End Our Projects Section -->

    </main><!-- End #main -->
@endsection
@section('custom-js')
@endsection
