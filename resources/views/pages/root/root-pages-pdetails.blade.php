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
                                <img src="{{ asset('storage/images/paket/' . $paket->image) }}" alt="">
                            </div>
                            @if ($paket->image_1)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/images/paket/' . $paket->image_1) }}" alt="">
                                </div>
                            @endif
                            @if ($paket->image_2)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/images/paket/' . $paket->image_2) }}" alt="">
                                </div>
                            @endif
                            @if ($paket->image_3)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/images/paket/' . $paket->image_3) }}" alt="">
                                </div>
                            @endif
                            @if ($paket->image_4)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/images/paket/' . $paket->image_4) }}" alt="">
                                </div>
                            @endif
                            @if ($paket->image_5)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/images/paket/' . $paket->image_5) }}" alt="">
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
                            <h2>{{ $paket->name }}</h2>
                            <p>{!! $paket->description !!}</p>

                            @if ($rating != null)
                                @foreach ($rating as $key => $rate)
                                    <div class="testimonial-item">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            {{ $rate->desc }}
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <div>
                                            <img src="{{ asset('storage/images/user/' . $rate->book->user->image) }}"
                                                class="testimonial-img" alt="">
                                            <h3>{{ $rate->book->user->name }}</h3>
                                            @for ($i = 0; $i < $rate->rate; $i++)
                                                <i class="text-warning bi bi-star-fill"></i>
                                            @endfor
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="portfolio-info">
                            <h3>{{ $paket->price }}</h3>
                            <ul>
                                <li><strong>Kategori</strong> <span>{{ $paket->cpaket->name }}</span></li>
                                <li><strong>Pengelola</strong> <span>{{ $paket->user->name }}</span></li>
                                <li><strong>Ditambahkan Pada</strong>
                                    <span>
                                        {{ \Carbon\Carbon::parse($paket->created_at)->isoFormat('dddd, D MMMM YYYY') }}
                                    </span>
                                </li>
                                <li><strong>Lihat Kategori Lain</strong> <a
                                        href="{{ route('root.pages.cpackage.show', $paket->cpaket->slug) }}">{{ route('root.pages.cpackage.show', $paket->cpaket->slug) }}</a>
                                </li>
                                @auth
                                    <li><a href="#" class="btn btn-outline-warning btn-rounded text-start"
                                            style="max-width: 245px;" data-bs-toggle="modal" data-bs-target="#bookNow"><i
                                                class="fa-solid fa-cart-plus"
                                                style="margin-right: 10px; margin-left: 35px;"></i>Booking Now</a></li>
                                    @if ($ubook->count() > 0)
                                        @if ($rating == null)
                                            <li><a href="#" class="btn btn-outline-warning btn-rounded text-start"
                                                    style="max-width: 245px;" data-bs-toggle="modal"
                                                    data-bs-target="#bookNow"><i class="fa-solid fa-star"
                                                        style="margin-right: 10px; margin-left: 35px;"></i>Rate us</a></li>
                                        @endif
                                    @endif
                                @endauth

                                @guest
                                    <li><a href="#" class="btn btn-outline-warning btn-rounded text-start"
                                            style="max-width: 245px;" data-bs-toggle="modal" data-bs-target="#loginNow"><i
                                                class="fa-solid fa-lock"
                                                style="margin-right: 10px; margin-left: 35px;"></i>Login to Booking</a></li>
                                @endguest
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Projet Details Section -->

    </main><!-- End #main -->

    {{-- Modal Booking Now --}}
    <div class="modal fade" id="bookNow" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('member.book.product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header" style="font-size: 20px">
                        <h5 class="modal-title" id="tabsModalLabel">Pesan Paket</h5>
                        <div class="d-flex justify-content-between align-items-center">

                            <button style="margin-right: 10px;" type="submit" class="btn btn-rounded btn-outline-secondary"
                                data-bs-dismiss="modal">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                            <button style="" type="button" class="btn btn-rounded btn-outline-warning"
                                data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        @auth
                            <div class="form-group col-12 mb-3" style="display: none">
                                <input type="hidden" name="user_id" id="user_id" class="form-control"
                                    value="{{ Auth::user()->id }}">
                                @error('user_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        @endauth
                        <div class="form-group col-12 mb-3" style="display: none">
                            <input type="hidden" name="paket_id" id="paket_id" class="form-control"
                                value="{{ $paket->id }}">
                            @error('paket_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 mb-3">
                            <label for="book_date">Pilih Tanggal</label>
                            <input type="date" name="book_date" id="book_date" class="form-control"
                                placeholder="Input your date...">
                            @error('book_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 mb-3">
                            <label for="book_time">Pilih Jam</label>
                            <select name="book_time" id="book_time" class="form-select">
                                <option value="">Choose Time</option>
                                <option value="07.00">07.00</option>
                                <option value="08.00">08.00</option>
                                <option value="09.00">09.00</option>
                                <option value="10.00">10.00</option>
                                <option value="11.00">11.00</option>
                                <option value="12.00">12.00</option>
                                <option value="13.00">13.00</option>
                                <option value="14.00">14.00</option>
                                <option value="15.00">15.00</option>
                                <option value="16.00">16.00</option>
                                <option value="17.00">17.00</option>
                                <option value="18.00">18.00</option>
                                <option value="19.00">19.00</option>
                                <option value="20.00">20.00</option>
                                <option value="21.00">21.00</option>
                            </select>
                            @error('book_time')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 mb-3">
                            <label for="book_note">Catatan Tambahan</label>
                            <textarea name="book_note" id="book_note" cols="30" rows="10" class="form-control"
                                placeholder="Input your message..."></textarea>
                            @error('book_note')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('base.root.root-modal')
@endsection
@section('custom-js')
@endsection
