@if(Auth::user()->type == 'User')
<li class="menu {{ Str::is('user/home*', request()->path()) ? 'active' : '' }}">
    <a href="{{ url('/user/home') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-house-user" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Dashboard</span>
        </div>
    </a>
</li>
<li class="menu {{ Str::is('user/profile*', request()->path()) ? 'active' : '' }}">
    <a href="{{ url('/user/profile') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-user-edit" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Profile</span>
        </div>
    </a>
</li>
<li class="menu {{ Str::is('user/app/todo*', request()->path()) ? 'active' : '' }}">
    <a href="{{ url('/user/app/todo') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-list-check" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
            <span>Todo List</span>
        </div>
    </a>
</li>
@endif
