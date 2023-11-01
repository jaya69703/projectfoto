@if(Auth::user()->type == 'Member')
<div class="row layout-top-spacing">
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.pending') }}">
            <div class="card btn btn-outline-success">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-cart-shopping" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Pesanan diProses <br>{{ App\Models\Booking::whereIn('book_stat', [2,3,4,5,6])->where('user_id', Auth::user()->id)->get()->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.pending') }}">
            <div class="card btn btn-outline-success">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-cart-shopping" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Pesanan berhasil <br>{{ App\Models\Booking::where('book_stat', '7')->where('user_id', Auth::user()->id)->get()->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.pending') }}">
            <div class="card btn btn-outline-success">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-cart-shopping" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Semua Pesanan <br>{{ App\Models\Booking::where('user_id', Auth::user()->id)->count() }}</span>
                </div>
            </div>
        </a>
    </div>
</div>
@endif
