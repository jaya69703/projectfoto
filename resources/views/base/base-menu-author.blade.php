@if(Auth::user()->type == 'Author')
<li class="menu {{ Str::is('author/home*', request()->path()) ? 'active' : '' }}">
    <a href="{{ url('/author/home') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-house-user" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Dashboard</span>
        </div>
    </a>
</li>
<li class="menu {{ Str::is('author/profile*', request()->path()) ? 'active' : '' }}">
    <a href="{{ url('/author/profile') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-user-edit" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Profile</span>
        </div>
    </a>
</li>
<li class="menu {{ Str::is('author/app/todo*', request()->path()) ? 'active' : '' }}">
    <a href="{{ url('/author/app/todo') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-list-check" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Todo List</span>
        </div>
    </a>
</li>

<li class="menu menu-heading">
    <div class="heading text-white">MENU AUTHOR</div>
</li>
<li class="menu">
    <a href="#manageBooking" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-book-bookmark" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></i>
            <span>Kelola Pesanan</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="manageBooking" data-bs-parent="#accordionExample">
        <li class="menu {{ Str::is('author/booking/all*', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/author/booking/all') }}">Semua Pesanan </a>
        </li>
        <li class="menu {{ Str::is('author/booking/pending*', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/author/booking/pending') }}">Menunggu Pembayaran </a>
        </li>
        <li class="menu {{ Str::is('author/booking/verify*', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/author/booking/verify') }}">Menunggu Verifikasi </a>
        </li>
    </ul>
</li>

@endif
