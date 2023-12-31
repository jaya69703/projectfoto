<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $web = App\Models\WebSetting::find(1);
    @endphp
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $web->name . ' - ' . $menu . ' - ' . $submenu }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('root') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('root') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('root') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('root') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('root') }}/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('root') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('root') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('root') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('root') }}/assets/css/main.css" rel="stylesheet">

    {{-- Global Pages --}}
    <link rel="stylesheet" href="{{ asset('main') }}/src/plugins/src/sweetalerts2/sweetalerts2.css">
    <link href="{{ asset('main') }}/src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('main') }}/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet"
        type="text/css" />

    <style>
        /* CSS untuk tampilan mobile */
        @media (max-width: 768px) {
            .footer-menu {
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
                /* Animasi tampilan menu */
                opacity: 0;
                /* Awalnya sembunyikan teks dengan opacity 0 */
            }

            .footer-links h4 {
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: space-between;
                transition: transform 0.3s ease;
                /* Animasi ikon */
            }

            .footer-links.active .footer-menu {
                max-height: 300px;
                /* Sesuaikan dengan tinggi menu yang Anda inginkan */
                opacity: 1;
                /* Tampilkan teks dengan opacity 1 saat dibuka */
            }

            .footer-links.active h4 .dropdown-indicator {
                transform: scale(0.8);
                /* Mengubah ukuran ikon ketika dibuka */
            }

            .footer-links .dropdown-indicator {
                display: inline;
                /* Tampilkan ikon di tampilan mobile */
            }
        }

        /* CSS untuk tampilan desktop */
        @media (min-width: 769px) {
            .footer-links .dropdown-indicator {
                display: none;
                /* Sembunyikan ikon di tampilan desktop */
            }
        }
    </style>

    @yield('custom-css')

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="{{ asset('root') }}/assets/img/logo.png" alt=""> -->
                <h1>{{ $web->name }}<span>.</span></h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    @php $page = App\Models\Page::where('page_id', '1')->get(); @endphp
                    {{-- {{ dd($page); }} --}}
                    @foreach ($page as $item)
                        <li><a href="{{ url($item->page_route) }}"
                                class="{{ Str::is($item->page_route, request()->path()) ? 'active' : '' }}">{{ $item->page_name }}</a>
                        </li>
                    @endforeach
                    @auth
                        <li class="dropdown">
                            <a href="#"><i class="fa-solid fa-user-circle"
                                    style="font-size: 20px; margin-right: 8px;"></i><span
                                    style="margin-right: 5px;">{{ Auth::user()->name }}</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                @if (Auth::user()->type === 'Member')
                                    <li><a href="{{ route('member.book.profile') }}">Profile User</a></li>
                                @elseif(Auth::user()->type === 'Author')
                                    <li><a href="{{ route('author.home.index') }}">Panel Admin</a></li>
                                @elseif(Auth::user()->type === 'Admin')
                                    <li><a href="{{ route('admin.home.index') }}">Panel Admin</a></li>
                                @endif
                                <li><a href="{{ route('member.book.changepass') }}">Change Password</a></li>
                                <li><a href="{{ route('member.book.history') }}">Rent History</a></li>
                                <li>
                                    <a href="#" onclick="logout(event)">Sign Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                    @guest
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#loginNow">Sign In</a></li>
                    @endguest
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    @yield('content')
    @include('base.root.root-modal')


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content position-relative">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>{{ $web->name }}</h3>
                            <p>
                                A108 Adam Street <br>
                                NY 535022, USA<br><br>
                                <strong>Phone:</strong><a href="tel:{{ $web->site_phone }}">
                                    {{ $web->site_phone }}</a><br>
                                <strong>Email:</strong><a href="mailto:{{ $web->site_mail }}">
                                    {{ $web->site_mail }}</a><br>
                            </p>
                            <div class="social-links d-flex mt-3">
                                <a href="{{ $web->site_social_tw ?? '#' }}"
                                    class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-twitter"></i></a>
                                <a href="{{ $web->site_social_fb ?? '#' }}"
                                    class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-facebook"></i></a>
                                <a href="{{ $web->site_social_ig ?? '#' }}"
                                    class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="{{ $web->site_social_in ?? '#' }}"
                                    class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div><!-- End footer info column-->

                    @php $page0 = App\Models\Page::where('id', 1)->first(); @endphp
                    @php $page1 = App\Models\Page::where('page_id', '1')->paginate(5); @endphp
                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>{{ $page0->page_name }} <i class="bi bi-chevron-down dropdown-indicator"></i></h4>
                        <ul class="footer-menu">
                            @foreach ($page1 as $key => $item)
                                <li><a href="{{ $item->page_route }}">{{ $item->page_name }}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- End footer links column-->


                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Our Services <i class="bi bi-chevron-down dropdown-indicator"></i></h4>
                        <ul class="footer-menu">
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">Web Development</a></li>
                            <li><a href="#">Product Management</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Graphic Design</a></li>
                        </ul>
                    </div><!-- End footer links column-->

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Nobis illum <i class="bi bi-chevron-down dropdown-indicator"></i></h4>
                        <ul class="footer-menu">
                            <li><a href="#">Ipsam</a></li>
                            <li><a href="#">Laudantium dolorum</a></li>
                            <li><a href="#">Dinera</a></li>
                            <li><a href="#">Trodelas</a></li>
                            <li><a href="#">Flexo</a></li>
                        </ul>
                    </div><!-- End footer links column-->

                </div>
            </div>
        </div>

        <div class="footer-legal text-center position-relative">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>{{ $web->name }}</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('root') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('root') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('root') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('root') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('root') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('root') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('root') }}/assets/vendor/php-email-form/validate.js"></script>


    <!-- Template Main JS File -->
    <script src="{{ asset('root') }}/assets/js/main.js"></script>

    {{-- Global Pages --}}
    @yield('custom-js')
    <script src="{{ asset('main') }}/src/plugins/src/sweetalerts2/custom-sweetalert.js"></script>
    <script src="{{ asset('main') }}/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script>
        function logout(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'You will be logged out!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, log out',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Cancelled',
                        'Logout cancelled',
                        'error'
                    );
                }
            });
        }
    </script>

    <script>
        const footerLinks = document.querySelectorAll('.footer-links');

        footerLinks.forEach((link) => {
            const title = link.querySelector('h4');
            title.addEventListener('click', () => {
                link.classList.toggle('active');
            });
        });
    </script>
</body>

</html>
