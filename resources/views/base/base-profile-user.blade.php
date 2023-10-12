@if(Auth::user()->type == 'Member')
<form action="{{ route('member.profile.update') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
  <div class="row">
      <div class="col-lg-3 col-12 mb-2">
          <div class="card">
              <div class="card-header d-flex align-items-center justify-content-between">
                  <span class="header" style="font-size: 20px;">{{ $submenu }}</span>
                  <span class="header">
                      <button type="button" class="btn btn-outline-danger btn-rounded mr-2" id="reset-button"><i class="fa-solid fa-arrows-rotate"></i></button>
                      <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-floppy-disk"></i></button>
                  </span>
              </div>
              <div class="card-body text-center">
                  <img src="{{ asset('storage/images/user/'.Auth::user()->image) }}" class="card-img-top img-fluid" style="width: 300px;" alt="Profile-Picture" id="image-preview">
                  <input type="file" id="image" name="image" class="form-control mt-3" accept="image/x-png,image/gif,image/jpeg">
              </div>
          </div>
      </div>
      <div class="col-lg-9 col-12 mb-2">
          <div class="card">
              <div class="card-header d-flex align-items-center justify-content-between">
                  <span class="header" style="font-size: 20px;">{{ $submenu }}</span>
                  <span class="header">
                      <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                  </span>
              </div>
              <div id="tabsWithIcons" class="card-body">
                  <div class="rounded-pills-icon">
                      <ul class="nav nav-pills justify-content-center" id="rounded-pills-icon-tab" role="tablist">
                          <li class="nav-item ml-2 mr-2">
                              <a class="nav-link mb-2 active text-center" id="rounded-pills-icon-home-tab" data-bs-toggle="pill" href="#rounded-pills-icon-home" role="tab" aria-controls="rounded-pills-icon-home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Home</a>
                          </li>
                          <li class="nav-item ml-2 mr-2">
                              <a class="nav-link mb-2 text-center" id="rounded-pills-icon-profile-tab" data-bs-toggle="pill" href="#rounded-pills-icon-profile" role="tab" aria-controls="rounded-pills-icon-profile" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Profile</a>
                          </li>
                          <li class="nav-item ml-2 mr-2">
                              <a class="nav-link mb-2 text-center" id="rounded-pills-icon-contact-tab" data-bs-toggle="pill" href="#rounded-pills-icon-contact" role="tab" aria-controls="rounded-pills-icon-contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> Contact</a>
                          </li>

                      </ul>
                      <div class="tab-content" id="rounded-pills-icon-tabContent">
                          <div class="tab-pane fade show active" id="rounded-pills-icon-home" role="tabpanel" aria-labelledby="rounded-pills-icon-home-tab">
                              <div class="row">
                                  <div class="form-group col-lg-6 col-12 mb-2">
                                      <label for="name">Fullname</label>
                                      <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                      @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                  </div>
                                  <div class="form-group col-lg-6 col-12 mb-2">
                                      <label for="email">Email address</label>
                                      <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                      @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                  </div>
                                  <div class="form-group col-lg-6 col-12 mb-2">
                                      <label for="phone">Phone Number</label>
                                      <input type="text" id="phone" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                                      @error('phone') <small class="text-danger">{{ $message }}</small> @enderror

                                  </div>
                                  <div class="form-group col-lg-6 col-12 mb-2">
                                      <label for="code">User Code</label>
                                      <input type="text" id="code" name="code" class="form-control" value="{{ Auth::user()->code }}">
                                      @error('code') <small class="text-danger">{{ $message }}</small> @enderror

                                  </div>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="rounded-pills-icon-profile" role="tabpanel" aria-labelledby="rounded-pills-icon-profile-tab">
                              <div class="row">
                              </div>

                          </div>
                          <div class="tab-pane fade" id="rounded-pills-icon-contact" role="tabpanel" aria-labelledby="rounded-pills-icon-contact-tab">
                              <div class="row">

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</form>
@endif
