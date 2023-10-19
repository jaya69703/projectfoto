@if(Auth::user()->type == 'Super Admin')
<li class="menu {{ Str::is('superadmin/home*', request()->path()) ? 'active' : '' }}">
    <a href="{{ url('/superadmin/home') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-house-user" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Dashboard</span>
        </div>
    </a>
</li>
<li class="menu {{ Str::is('superadmin/profile*', request()->path()) ? 'active' : '' }}">
    <a href="{{ url('/superadmin/profile') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-user-edit" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Profile</span>
        </div>
    </a>
</li>
<li class="menu menu-heading">
    <div class="heading text-white">REKAP DATA</div>
</li>
<li class="menu">
    <a href="#manageTransaksi" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-database" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></i>
            <span>Rekap Data</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="manageTransaksi" data-bs-parent="#accordionExample">
        <li class="menu {{ Str::is('superadmin/transaksi/all*', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/superadmin/transaksi/all') }}">Data Transaksi </a>
        </li>
        <li class="menu {{ Str::is('superadmin/member/all*', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/superadmin/member/all') }}">Data Member </a>
        </li>
    </ul>
</li>
@endif
