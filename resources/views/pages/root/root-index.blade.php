@extends('base.base-root-index')
@section('custom-css')
    @php
        $web = App\Models\WebSetting::find(1)->first();
    @endphp
@endsection
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">

        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 data-aos="fade-down">{{ $web->head_title }}</h2>
                        <p data-aos="fade-up">{{ $web->head_desc }}</p>
                        <a data-aos="fade-up" data-aos-delay="200" href="#projects" class="btn-get-started">Get Started</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item"
                style="background-image: url({{ asset('storage/images/web/' . $web->site_slide_1) }})">
            </div>
            <div class="carousel-item"
                style="background-image: url({{ asset('storage/images/web/' . $web->site_slide_2) }})">
            </div>
            <div class="carousel-item"
                style="background-image: url({{ asset('storage/images/web/' . $web->site_slide_3) }})">
            </div>
            <div class="carousel-item active"
                style="background-image: url({{ asset('storage/images/web/' . $web->site_slide_4) }})">
            </div>
            <div class="carousel-item"
                style="background-image: url({{ asset('storage/images/web/' . $web->site_slide_5) }})">
            </div>

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>

    </section><!-- End Hero Section -->

    <main id="main">
        <!-- ======= Services Section ======= -->

        <!-- ======= Services Section ======= -->
        <section id="whyUs" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <div class="section-header">
                        <h2>Mengapa Memilih Kami?</h2>
                        <p>Kami menawarkan layanan yang disesuaikan dengan kebutuhan pelanggan, mulai dari foto produk hingga foto pernikahan.</p>
                    </div>
                </div>
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-camera"></i>
                            </div>
                            <h3>Peralatan fotografi berkualitas tinggi</h3>
                            <p>Kami menggunakan peralatan fotografi berkualitas tinggi untuk menghasilkan foto yang tajam
                                dan
                                beresolusi tinggi, sehingga Anda dapat mengabadikan momen istimewa Anda dengan sempurna.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <h3>Tim fotografer profesional yang berpengalaman</h3>
                            <p>Kami memiliki tim fotografer profesional yang berpengalaman dengan lebih dari 10 tahun
                                pengalaman
                                di bidang fotografi. Tim kami akan membantu Anda untuk mengabadikan momen istimewa Anda
                                dengan
                                cara yang terbaik.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            <h3>Layanan yang disesuaikan dengan kebutuhan Anda</h3>
                            <p>Kami menawarkan berbagai macam layanan fotografi, mulai dari foto produk hingga foto
                                pernikahan.
                                Kami juga dapat menyesuaikan layanan kami dengan kebutuhan spesifik Anda.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-money-bill-alt"></i>
                            </div>
                            <h3>Harga yang terjangkau</h3>
                            <p>Kami menawarkan harga yang terjangkau untuk semua jenis layanan fotografi. Kami ingin
                                memastikan
                                bahwa semua orang memiliki kesempatan untuk mengabadikan momen istimewa mereka dengan
                                kualitas
                                yang terbaik.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-smile"></i>
                            </div>
                            <h3>Garansi kepuasan pelanggan</h3>
                            <p>Kami memberikan garansi kepuasan pelanggan untuk semua layanan fotografi kami. Kami ingin
                                memastikan bahwa Anda puas dengan hasil foto yang kami berikan.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-handshake"></i>
                            </div>
                            <h3>Pelayanan yang baik</h3>
                            <p>Kami memberikan pelayanan yang cepat, ramah, dan responsif untuk memastikan kepuasan
                                pelanggan.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section id="services" class="projects">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Layanan Kami</h2>
                    <p>Kami menawarkan berbagai macam layanan fotografi, mulai dari foto produk hingga foto pernikahan. Kami juga dapat menyesuaikan layanan kami dengan kebutuhan spesifik Anda.</p>

                </div>

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">

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

                    </div><!-- End Projects Container -->
                    <div class="row mt-4">
                        <div class="col-lg-12 text-center">
                            <a href="{{ route('root.pages.pricing') }}" class="btn btn-outline-warning"
                                style="border-radius: 20px">Lihat Lainnya</a>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Our Projects Section -->

        @if ($rating == null)
            <!-- ======= Testimonials Section ======= -->
            <section id="testimonials" class="testimonials section-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-header">
                        <h2>Testimonials</h2>
                        <p>Quam sed id excepturi ccusantium dolorem ut quis dolores nisi llum nostrum enim velit qui ut et
                            autem
                            uia reprehenderit sunt deleniti</p>
                    </div>

                    <div class="slides-2 swiper">
                        <div class="swiper-wrapper">

                            @foreach ($rating as $item)
                                <div class="swiper-slide">
                                    <div class="testimonial-wrap">
                                        <div class="testimonial-item">
                                            <img src="{{ asset('storage/images/user/' . $item->book->user->image) }}"
                                                class="testimonial-img" alt="">
                                            <h3>{{ $item->book->user->name }}</h3>
                                            <h4>{{ $item->paket->name }}</h4>
                                            <div class="stars">
                                                @for ($i = 0; $i < $item->rate; $i++)
                                                    <i class="bi bi-star-fill"></i>
                                                @endfor
                                            </div>
                                            <p>
                                                <i class="bi bi-quote quote-icon-left"></i>
                                                {{ $item->desc }}
                                                <i class="bi bi-quote quote-icon-right"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- End testimonial item -->
                            @endforeach

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section><!-- End Testimonials Section -->
        @endif


        @if ($posts->count() > 0)
            <!-- ======= Recent Blog Posts Section ======= -->
            <section id="recent-blog-posts" class="recent-blog-posts">
                <div class="container" data-aos="fade-up">
                    <div class=" section-header">
                        <h2>Recent Blog Posts</h2>
                        <p>In commodi voluptatem excepturi quaerat nihil error autem voluptate ut et officia consequuntu</p>
                    </div>

                    <div class="row gy-5">

                        @forelse($posts as $key => $item)
                            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="post-item position-relative h-100">

                                    <div class="post-img position-relative overflow-hidden">
                                        <img src="{{ asset('storage/images/cover/' . $item->cover) }}" class="img-fluid"
                                            alt="">
                                        <span class="post-date">{{ $item->created_at->diffForHumans() }}</span>
                                    </div>

                                    <div class="post-content d-flex flex-column">

                                        <h3 class="post-title">{{ $item->title }}</h3>

                                        <div class="meta d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-person"></i> <span
                                                    class="ps-2">{{ $item->user->name }}</span>
                                            </div>
                                            <span class="px-3 text-black-50">/</span>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-folder2"></i> <span
                                                    class="ps-2">{{ $item->category->name }}</span>
                                            </div>
                                        </div>

                                        <hr>

                                        <a href="{{ route('root.pages.blog.single', $item->slug) }}"
                                            class="readmore stretched-link"><span>Read More</span><i
                                                class="bi bi-arrow-right"></i></a>

                                    </div>

                                </div>
                            </div><!-- End post item -->

                        @empty
                            <div class="col-lg-12 col-12 mb-3 text-center">

                                <p class="text">Belum ada blog</p>
                            </div>
                        @endforelse


                    </div>

                </div>
            </section>
            <!-- End Recent Blog Posts Section -->
        @endif

    </main><!-- End #main -->
@endsection
@section('custom-js')
@endsection
