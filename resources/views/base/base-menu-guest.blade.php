<li class="menu {{ Str::is('announcement*', request()->path()) || Str::is('login', request()->path()) || Str::is('register', request()->path()) ? 'active' : '' }}">
    <a href="#IdAuth" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-lock" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Auth Pages</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="IdAuth" data-bs-parent="accordionExample">
        <li class="menu {{ Str::is('login', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/login') }}">SignIn</a>
        </li>
        <li class="menu {{ Str::is('register', request()->path()) ? 'active' : '' }}">
            <a href="{{ url('/register') }}">SignUp</a>
        </li>
    </ul>
</li>

