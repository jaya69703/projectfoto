
@auth
@if(!(Auth::user()->email) && !(Auth::user()->phone))
<div class="alert alert-arrow-right alert-icon-right alert-light-warning alert-dismissible fade show mt-4 mb-2 layout-top-spacing" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
    <strong>Peringatan ! </strong>Profile kamu belum lengkap, Mohon segera dilengkapi dengan cara. <a href="#">Klik disini.</a>
</div>
@endif
@endauth


@if(session('success'))
    <div class="alert alert-icon-left alert-light-success alert-dismissible fade show mb-2 mt-4" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle">
            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
            <line x1="12" y1="9" x2="12" y2="13"></line>
            <line x1="12" y1="17" x2="12" y2="17"></line>
        </svg>
        <strong>Success!</strong> {{ session('success') }}
    </div>
@endif

@if(session('failed'))
    <div class="alert alert-icon-left alert-light-danger alert-dismissible fade show mb-2 mt-4" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
        <strong>Failed!</strong> {{ session('failed') }}
    </div>
@endif
