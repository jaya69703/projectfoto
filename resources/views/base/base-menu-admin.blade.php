@if(Auth::user()->type == 'Admin')
<li class="menu {{ Str::is('admin/home*', request()->path()) ? 'active' : '' }}">
    <a href="{{ url('/admin/home') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-house-user" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Beranda</span>
        </div>
    </a>
</li>
<li class="menu {{ Str::is('admin/profile*', request()->path()) ? 'active' : '' }}">
    <a href="{{ url('/admin/profile') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-user-edit" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Profile</span>
        </div>
    </a>
</li>
<li class="menu {{ Str::is('admin/app/todo*', request()->path()) ? 'active' : '' }}">
    <a href="{{ url('/admin/app/todo') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-list-check" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Daftar Tugas</span>
        </div>
    </a>
</li>

<li class="menu menu-heading">
    <div class="heading text-white">MENU ADMIN</div>
</li>
<li class="menu {{ Route::is('admin.usermanage*') ? 'active' : '' }}">
    <a href="#manageUser" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle {{ Request::is('admin/usermanage/admin*') || Request::is('admin/usermanage/member*') ? 'active' : '' }}">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-users" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></i>
            <span>Kelola Pengguna</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="manageUser" data-bs-parent="#accordionExample">
        <li class="menu {{ Str::is('admin/usermanage/member*', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/admin/usermanage/member') }}">Pengguna Member </a>
        </li>
        <li class="menu {{ Str::is('admin/usermanage/memplus*', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/admin/usermanage/memplus') }}">Pengguna Member Plus </a>
        </li>
        <li class="menu {{ Str::is('admin/usermanage/author*', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/admin/usermanage/author') }}">Pengguna Author </a>
        </li>
        <li class="menu {{ Str::is('admin/usermanage/admin*', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/admin/usermanage/admin') }}">Pengguna Admin </a>
        </li>
    </ul>
</li>
<li class="menu {{ Route::is('admin.paket.*') | Route::is('admin.paket-kategori.*') ? 'active' : '' }}">
    <a href="#managePaket" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle {{ Request::is('admin/usermanage/admin*') || Request::is('admin/usermanage/member*') ? 'active' : '' }}">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-box-open" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></i>
            <span>Kelola Paket</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="managePaket" data-bs-parent="#accordionExample">
        <li class="menu {{ Route::is('admin.paket-kategori.*', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/admin/paket-kategori') }}">Daftar Kategori Paket </a>
        </li>
        <li class="menu {{ Route::is('admin.paket.*', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/admin/paket') }}">Daftar Paket </a>
        </li>

    </ul>
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
        <li class="menu {{ Str::is('admin/booking/all*', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/admin/booking/all') }}">Semua Pesanan </a>
        </li>
        <li class="menu {{ Str::is('admin/booking/pending*', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/admin/booking/pending') }}">Menunggu Pembayaran </a>
        </li>
        <li class="menu {{ Str::is('admin/booking/verify*', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/admin/booking/verify') }}">Menunggu Verifikasi </a>
        </li>
    </ul>
</li>
<li class="menu {{ Str::is('admin/message*', request()->path()) ? 'active' : '' }}">
    <a href="{{ url('/admin/message') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-envelope" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Pesan Masuk</span>
        </div>
    </a>
</li>
<li class="menu {{ Str::is('admin/pages*', request()->path()) ? 'active' : '' }}">
    <a href="{{ url('/admin/pages') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-folder" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Kelola Halaman</span>
        </div>
    </a>
</li>
<li class="menu {{ Str::is('admin/app/announ*', request()->path()) ? 'active' : '' }}">
    <a href="{{ url('/admin/app/announ') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-bullhorn" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Kelola Pengumuman</span>
        </div>
    </a>
</li>
<li class="menu menu-heading">
    <div class="heading text-white">PENGATURAN</div>
</li>
<li class="menu {{ Str::is('admin/app/setting*', request()->path()) ? 'active' : '' }}">
    <a href="{{ url('/admin/app/setting') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-gear" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Pengaturan Website</span>
        </div>
    </a>
</li>
@endif
