@if(Auth::user()->type == 'Author')
<div class="row layout-top-spacing">
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('author.booking.view') }}">
            <div class="card btn btn-outline-primary">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-edit" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Proses Editing <br> {{ App\Models\Booking::where('book_stat', '6')->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    {{-- <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('author.booking.view') }}">
            <div class="card btn btn-outline-success">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-images" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Sudah Upload <br> {{ App\Models\Booking::where('book_stat', '7')->count() }}</span>
                </div>
            </div>
        </a>
    </div> --}}
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.pending') }}">
            <div class="card btn btn-outline-secondary">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-newspaper" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Artikel Publish <br> {{ App\Models\Post::all()->count() }} </span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.pending') }}">
            <div class="card btn btn-outline-warning">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-folder" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Jumlah Kategori <br> {{ App\Models\CategoryB::all()->count() }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <a href="{{ route('admin.booking.pending') }}">
            <div class="card btn btn-outline-success">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <span class="icon"><i class="fa-solid fa-tags" style="font-size: 50px"></i></span>
                    <span class="text-white" style="margin-left: 20px; font-size: 16px;">Jumlah Tags <br> {{ App\Models\Tagsb::all()->count() }} </span>
                </div>
            </div>
        </a>
    </div>
</div>

@endif
