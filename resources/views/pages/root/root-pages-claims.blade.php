@extends('base.base-root-index')
@section('custom-css')
    <style>
        .thumbs {
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2rem;
            color: white;
        }

        .timeline {
            position: relative;
            background: #ffffff;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            padding: 5rem;
            margin: 0 auto 1rem auto;
            overflow: hidden;
        }

        .timeline:after {
            content: "";
            position: absolute;
            top: 0;
            left: 50%;
            margin-left: -2px;
            border-right: 2px dashed #05004e;
            height: 100%;
            display: block;
        }

        .timeline-row {
            padding-left: 50%;
            position: relative;
            margin-bottom: 30px;
        }

        .timeline-row .timeline-time {
            position: absolute;
            right: 50%;
            top: 15px;
            text-align: right;
            margin-right: 20px;
            color: #bcd0f7;
            font-size: 1.5rem;
        }

        .timeline-row .timeline-time small {
            display: block;
            font-size: 0.8rem;
        }

        .timeline-row .timeline-content {
            position: relative;
            padding: 20px 30px;
            background: #ffffff;
            border: 2px dashed #feb900;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .timeline-row .timeline-content:after {
            content: "";
            position: absolute;
            top: 20px;
            height: 16px;
            width: 16px;
            background: #feb900;
        }

        .timeline-row .timeline-content:before {
            content: "";
            position: absolute;
            top: 20px;
            right: -49px;
            width: 20px;
            height: 20px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
            z-index: 10;
            background: #ffffff;
            border: 2px dashed #feb900;
        }

        .timeline-row .timeline-content h4 {
            margin: 0 0 20px 0;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            line-height: 150%;
        }

        .timeline-row .timeline-content p {
            margin-bottom: 30px;
            line-height: 150%;
        }

        .timeline-row .timeline-content i {
            font-size: 1.2rem;
            line-height: 100%;
            padding: 15px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
            background: #feb900;
            margin-bottom: 10px;
            display: inline-block;
        }

        .timeline-row .timeline-content .thumbs {
            margin-bottom: 20px;
            display: flex;
        }

        .timeline-row .timeline-content .thumbs img {
            margin: 5px;
            max-width: 60px;
        }

        .timeline-row .timeline-content .badge {
            color: #ffffff;
            background: linear-gradient(120deg, #00b5fd 0%, #0047b1 100%);
        }

        .timeline-row:nth-child(even) .timeline-content {
            margin-left: 40px;
            text-align: left;
        }

        .timeline-row:nth-child(even) .timeline-content:after {
            left: -8px;
            right: initial;
            border-bottom: 0;
            border-left: 0;
            transform: rotate(-135deg);
        }

        .timeline-row:nth-child(even) .timeline-content:before {
            left: -52px;
            right: initial;
        }

        .timeline-row:nth-child(odd) {
            padding-left: 0;
            padding-right: 50%;
        }

        .timeline-row:nth-child(odd) .timeline-time {
            right: auto;
            left: 50%;
            text-align: left;
            margin-right: 0;
            margin-left: 20px;
        }

        .timeline-row:nth-child(odd) .timeline-content {
            margin-right: 40px;
        }

        .timeline-row:nth-child(odd) .timeline-content:after {
            right: -8px;
            border-left: 0;
            border-bottom: 0;
            transform: rotate(45deg);
        }

        @media (max-width: 992px) {
            .timeline {
                padding: 15px;
            }

            .timeline:after {
                border: 0;
            }

            .timeline .timeline-row:nth-child(odd) {
                padding: 0;
            }

            .timeline .timeline-row:nth-child(odd) .timeline-time {
                position: relative;
                top: 0;
                left: 0;
                margin: 0 0 10px 0;
            }

            .timeline .timeline-row:nth-child(odd) .timeline-content {
                margin: 0;
            }

            .timeline .timeline-row:nth-child(odd) .timeline-content:before {
                display: none;
            }

            .timeline .timeline-row:nth-child(odd) .timeline-content:after {
                display: none;
            }

            .timeline .timeline-row:nth-child(even) {
                padding: 0;
            }

            .timeline .timeline-row:nth-child(even) .timeline-time {
                position: relative;
                top: 0;
                left: 0;
                margin: 0 0 10px 0;
                text-align: left;
            }

            .timeline .timeline-row:nth-child(even) .timeline-content {
                margin: 0;
            }

            .timeline .timeline-row:nth-child(even) .timeline-content:before {
                display: none;
            }

            .timeline .timeline-row:nth-child(even) .timeline-content:after {
                display: none;
            }
        }
    </style>
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

        <div class="container">
            <div class="timeline">
                
                @php $bookdone = App\Models\Booking::where('book_stat', 7)->get() @endphp
                @foreach ($bookdone as $item)
                    
                <div class="timeline-row">
                    <div class="timeline-time" style="color: #feb900;">
                        7:45PM<small>{{ $item->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="timeline-content">
                        <i class="fa-solid fa-image text-white"></i>
                        <h4>Package Delivery</h4>
                        <p>Pesanan Milik {{ $item->user->name }} Pada Kategori {{ $item->paket->cpaket->name }} Telah Selesai.</p>
                        <div class="thumbs">
                            <img class="img-fluid rounded" src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                alt="Maxwell Admin">
                            <div class="overlay">
                                <i class="icon fa-solid fa-lock"></i>
                            </div>
                        </div>
                        <div class="">
                            <a href="/#whyUs" class="btn btn-outline-warning btn-sm" style="border-radius: 20px">{{ $item->paket->name }}</a>
                            {{-- <span class="btn btn-outline-warning btn-sm" style="border-radius: 20px"><a href="">Paket A</a></span> --}}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </main><!-- End #main -->
@endsection
@section('custom-js')
@endsection
