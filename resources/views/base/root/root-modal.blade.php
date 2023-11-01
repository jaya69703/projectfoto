<div class="modal fade" id="loginNow" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header" style="font-size: 20px">
                    <h5 class="modal-title" id="tabsModalLabel">Login Account</h5>
                    <div class="d-flex justify-content-between align-items-center">

                        <button style="margin-right: 10px; border-radius: 20px;" type="submit"
                            class="btn btn-rounded btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                        <button style="border-radius: 20px;" type="button" class="btn btn-rounded btn-outline-warning"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-close"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group col-12 mb-3">
                        <label for="email">Email Address</label>
                        <input autocomplete="off" type="email" name="email" id="email" class="form-control"
                            placeholder="Input your email...">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="password">Password</label>
                        <input autocomplete="off" type="password" name="password" id="password" class="form-control"
                            placeholder="Input your password...">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <span class="">Belum Punya Akun?<a href="#" data-bs-toggle="modal"
                            data-bs-target="#registNow"> Klik Disini</a></span>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="registNow" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header" style="font-size: 20px">
                    <h5 class="modal-title" id="tabsModalLabel">Register Account</h5>
                    <div class="d-flex justify-content-between align-items-center">

                        <button style="margin-right: 10px; border-radius: 20px;" type="submit"
                            class="btn btn-rounded btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                        <button style="border-radius: 20px;" type="button" class="btn btn-rounded btn-outline-warning"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-close"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group col-12 mb-3">
                        <label for="name">Fullname</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Input your name...">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="phone">Phone number</label>
                        <input type="phone" name="phone" id="phone" class="form-control"
                            placeholder="Input your phone...">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Input your email...">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Input your password...">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="password_confirmation">Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" placeholder="Confirm your password...">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <span class="">Sudah Punya Akun?<a href="#" data-bs-toggle="modal"
                            data-bs-target="#loginNow"> Klik Disini</a></span>
                </div>
            </div>
        </form>
    </div>
</div>
