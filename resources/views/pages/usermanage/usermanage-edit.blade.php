@extends('base.base-index')
@section('custom-css')
    <link href="{{ asset('main') }}/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/src/assets/css/light/components/tabs.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('main') }}/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/src/assets/css/dark/components/tabs.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="layout-top-spacing">

        @if (Auth::user()->type == 'User')
        <form action="{{ route('admin.usermanage.user.update', $usermanage->id) }}" method="POST" enctype="multipart/form-data">
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

                          <img src="{{ asset('storage/images/user/'.$usermanage->image) }}" class="card-img-top img-fluid" style="width: 300px;" alt="Profile-Picture" id="image-preview">
                          <input type="file" id="image" name="image" class="form-control mt-3" accept="image/x-png,image/gif,image/jpeg">

                      </div>
                  </div>
              </div>
              <div class="col-lg-9 col-12 mb-2">
                  <div class="card">
                      <div class="card-header d-flex align-items-center justify-content-between">
                          <span class="header" style="font-size: 20px;">{{ $submenu }}</span>
                          <span class="header">
                                <a href="{{ route('admin.usermanage.user.index') }}" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-backward"></i></a>
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
                                            <label for="worker_name">Nama</label>
                                            <input type="text" id="worker_name" name="worker_name" class="form-control"  placeholder="Inputkan Nama Lengkap Pengguna..." value="{{ $usermanage->worker->worker_name }}">
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mb-2">
                                            <label for="worker_nitk">Nomor Induk Tenaga Kependidikan</label>
                                            <input type="text" id="worker_nitk" name="worker_nitk" class="form-control" placeholder="Inputkan Nomor Induk Tenaga Kependidikan...">
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mb-2">
                                            <label for="divisi_id">Divisi</label>
                                            <select name="divisi_id" id="divisi" class="form-select">
                                                <option value="" selected>Select Divisi</option>
                                                <option value="1" {{ $usermanage->divisi_id == 1 ? 'selected' : '' }}>Bagian Akademik</option>
                                                <option value="2" {{ $usermanage->divisi_id == 2 ? 'selected' : '' }}>Bagian Keuangan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mb-2">
                                            <label for="position_id">Jabatan</label>
                                            <input type="text" id="position_id" name="position_id" class="form-control" placeholder="Inputkan Jabatan...">
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mb-2">
                                            <label for="worker_start">Awal Masuk Kerja</label>
                                            <input type="date" id="worker_start" name="worker_start" class="form-control" placeholder="Inputkan Tanggal Awal Masuk Kerja...">
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mb-2">
                                            <label for="worker_sknumber">Nomor Surat Tugas</label>
                                            <input type="text" id="worker_sknumber" name="worker_sknumber" class="form-control" placeholder="Inputkan Nomor Surat Tugas...">
                                        </div>
                                    </div>
                                  </div>
                                  <div class="tab-pane fade" id="rounded-pills-icon-profile" role="tabpanel" aria-labelledby="rounded-pills-icon-profile-tab">
                                      <div class="row">
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_name">Nama</label>
                                              <input type="text" id="worker_name" name="worker_name" class="form-control" placeholder="Inputkan Nama Lengkap Pengguna...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="kelas_id">Kelas</label>
                                              <input type="text" id="kelas_id" name="kelas_id" class="form-control" placeholder="Inputkan Nama Lengkap Pengguna...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_niknumber">Nomor Induk Kependudukan</label>
                                              <input type="text" id="worker_niknumber" name="worker_niknumber" class="form-control" placeholder="Inputkan Nomor Induk Kependudukan...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_kknumber">Nomor Kartu Keluarga</label>
                                              <input type="text" id="worker_kknumber" name="worker_kknumber" class="form-control" placeholder="Inputkan Nomor Kartu Keluarga...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_email">Alamat Email</label>
                                              <input type="text" id="worker_email" name="worker_email" class="form-control" placeholder="Inputkan Alamat Email Pengguna...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_phone">Nomor Telepon</label>
                                              <input type="text" id="worker_phone" name="worker_phone" class="form-control" placeholder="Inputkan Nomor Telepon Pengguna...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_placebirth">Tempat Lahir</label>
                                              <input type="text" id="worker_placebirth" name="worker_placebirth" class="form-control" placeholder="Inputkan Tempat Lahir kamu...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_datebirth">Tanggal Lahir</label>
                                              <input type="date" id="worker_datebirth" name="worker_datebirth" class="form-control" placeholder="Inputkan Tanggal Lahir kamu...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_gender">Jenis Kelamin</label>
                                              <select name="worker_gender" id="worker_gender" class="form-select">
                                                  <option value="" selected>Pilih Jenis Kelamin</option>
                                                  <option value="Pria">Laki Laki</option>
                                                  <option value="Wanita">Perempuan</option>
                                              </select>
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_religion">Agama</label>
                                              <select name="worker_religion" id="worker_religion" class="form-select">
                                                  <option value="" selected>Pilih Agama Anda</option>
                                                  <option value="Agama Islam">Agama Islam</option>
                                                  <option value="Agama Kristen">Agama Kristen</option>
                                                  <option value="Agama Hindu">Agama Hindu</option>
                                                  <option value="Agama Buddha">Agama Buddha</option>
                                                  <option value="Agama Konghuchu">Agama Konghuchu</option>
                                              </select>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="tab-pane fade" id="rounded-pills-icon-contact" role="tabpanel" aria-labelledby="rounded-pills-icon-contact-tab">
                                      <div class="row">
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_father">Nama Ayah</label>
                                              <input type="text" id="worker_father" name="worker_father" class="form-control" placeholder="Inputkan Nama Ayah...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_phonefather">Nomor Telepon Ayah</label>
                                              <input type="text" id="worker_phonefather" name="worker_phonefather" class="form-control" placeholder="Inputkan Nomor Telepon Ayah...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_mother">Nama Ibu</label>
                                              <input type="text" id="worker_mother" name="worker_mother" class="form-control" placeholder="Inputkan Nama Ibu...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_phonemother">Nomor Telepon Ibu</label>
                                              <input type="text" id="worker_phonemother" name="worker_phonemother" class="form-control" placeholder="Inputkan Nomor Telepon Ibu...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_wali">Nama Wali ( Opsional )</label>
                                              <input type="text" id="worker_wali" name="worker_wali" class="form-control" placeholder="Inputkan Nama Wali...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_phonewali">Nomor Telepon Wali ( Opsional )</label>
                                              <input type="text" id="worker_phonewali" name="worker_phonewali" class="form-control" placeholder="Inputkan Nomor Telepon Wali...">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </form>
        @else
        <form action="{{ route('admin.usermanage.worker.update', $usermanage->id) }}" method="POST" enctype="multipart/form-data">
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

                          <img src="{{ asset('storage/images/user/'.$usermanage->image) }}" class="card-img-top img-fluid" style="width: 300px;" alt="Profile-Picture" id="image-preview">
                          <input type="file" id="image" name="image" class="form-control mt-3" accept="image/x-png,image/gif,image/jpeg">

                      </div>
                  </div>
              </div>
              <div class="col-lg-9 col-12 mb-2">
                  <div class="card">
                      <div class="card-header d-flex align-items-center justify-content-between">
                          <span class="header" style="font-size: 20px;">{{ $submenu }}</span>
                          <span class="header">
                                <a href="{{ route('admin.usermanage.user.index') }}" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-backward"></i></a>
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
                                            <label for="worker_name">Nama</label>
                                            <input type="text" id="worker_name" name="worker_name" class="form-control"  placeholder="Inputkan Nama Lengkap Pengguna..." value="{{ $usermanage->worker->worker_name }}">
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mb-2">
                                            <label for="worker_nitk">Nomor Induk Tenaga Kependidikan</label>
                                            <input type="text" id="worker_nitk" name="worker_nitk" class="form-control" placeholder="Inputkan Nomor Induk Tenaga Kependidikan...">
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mb-2">
                                            <label for="divisi_id">Divisi</label>
                                            <select name="divisi_id" id="divisi" class="form-select">
                                                <option value="" selected>Select Divisi</option>
                                                <option value="1" {{ $usermanage->divisi_id == 1 ? 'selected' : '' }}>Bagian Akademik</option>
                                                <option value="2" {{ $usermanage->divisi_id == 2 ? 'selected' : '' }}>Bagian Keuangan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mb-2">
                                            <label for="position_id">Jabatan</label>
                                            <input type="text" id="position_id" name="position_id" class="form-control" placeholder="Inputkan Jabatan...">
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mb-2">
                                            <label for="worker_start">Awal Masuk Kerja</label>
                                            <input type="date" id="worker_start" name="worker_start" class="form-control" placeholder="Inputkan Tanggal Awal Masuk Kerja...">
                                        </div>
                                        <div class="form-group col-lg-6 col-12 mb-2">
                                            <label for="worker_sknumber">Nomor Surat Tugas</label>
                                            <input type="text" id="worker_sknumber" name="worker_sknumber" class="form-control" placeholder="Inputkan Nomor Surat Tugas...">
                                        </div>
                                    </div>
                                  </div>
                                  <div class="tab-pane fade" id="rounded-pills-icon-profile" role="tabpanel" aria-labelledby="rounded-pills-icon-profile-tab">
                                      <div class="row">
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_name">Nama</label>
                                              <input type="text" id="worker_name" name="worker_name" class="form-control" placeholder="Inputkan Nama Lengkap Pengguna...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="kelas_id">Kelas</label>
                                              <input type="text" id="kelas_id" name="kelas_id" class="form-control" placeholder="Inputkan Nama Lengkap Pengguna...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_niknumber">Nomor Induk Kependudukan</label>
                                              <input type="text" id="worker_niknumber" name="worker_niknumber" class="form-control" placeholder="Inputkan Nomor Induk Kependudukan...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_kknumber">Nomor Kartu Keluarga</label>
                                              <input type="text" id="worker_kknumber" name="worker_kknumber" class="form-control" placeholder="Inputkan Nomor Kartu Keluarga...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_email">Alamat Email</label>
                                              <input type="text" id="worker_email" name="worker_email" class="form-control" placeholder="Inputkan Alamat Email Pengguna...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_phone">Nomor Telepon</label>
                                              <input type="text" id="worker_phone" name="worker_phone" class="form-control" placeholder="Inputkan Nomor Telepon Pengguna...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_placebirth">Tempat Lahir</label>
                                              <input type="text" id="worker_placebirth" name="worker_placebirth" class="form-control" placeholder="Inputkan Tempat Lahir kamu...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_datebirth">Tanggal Lahir</label>
                                              <input type="date" id="worker_datebirth" name="worker_datebirth" class="form-control" placeholder="Inputkan Tanggal Lahir kamu...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_gender">Jenis Kelamin</label>
                                              <select name="worker_gender" id="worker_gender" class="form-select">
                                                  <option value="" selected>Pilih Jenis Kelamin</option>
                                                  <option value="Pria">Laki Laki</option>
                                                  <option value="Wanita">Perempuan</option>
                                              </select>
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_religion">Agama</label>
                                              <select name="worker_religion" id="worker_religion" class="form-select">
                                                  <option value="" selected>Pilih Agama Anda</option>
                                                  <option value="Agama Islam">Agama Islam</option>
                                                  <option value="Agama Kristen">Agama Kristen</option>
                                                  <option value="Agama Hindu">Agama Hindu</option>
                                                  <option value="Agama Buddha">Agama Buddha</option>
                                                  <option value="Agama Konghuchu">Agama Konghuchu</option>
                                              </select>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="tab-pane fade" id="rounded-pills-icon-contact" role="tabpanel" aria-labelledby="rounded-pills-icon-contact-tab">
                                      <div class="row">
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_father">Nama Ayah</label>
                                              <input type="text" id="worker_father" name="worker_father" class="form-control" placeholder="Inputkan Nama Ayah...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_phonefather">Nomor Telepon Ayah</label>
                                              <input type="text" id="worker_phonefather" name="worker_phonefather" class="form-control" placeholder="Inputkan Nomor Telepon Ayah...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_mother">Nama Ibu</label>
                                              <input type="text" id="worker_mother" name="worker_mother" class="form-control" placeholder="Inputkan Nama Ibu...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_phonemother">Nomor Telepon Ibu</label>
                                              <input type="text" id="worker_phonemother" name="worker_phonemother" class="form-control" placeholder="Inputkan Nomor Telepon Ibu...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_wali">Nama Wali ( Opsional )</label>
                                              <input type="text" id="worker_wali" name="worker_wali" class="form-control" placeholder="Inputkan Nama Wali...">
                                          </div>
                                          <div class="form-group col-lg-6 col-12 mb-2">
                                              <label for="worker_phonewali">Nomor Telepon Wali ( Opsional )</label>
                                              <input type="text" id="worker_phonewali" name="worker_phonewali" class="form-control" placeholder="Inputkan Nomor Telepon Wali...">
                                          </div>
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

    </div>
@endsection
@section('custom-js')
<script>

    // Mendapatkan elemen-elemen yang dibutuhkan
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const resetButton = document.getElementById('reset-button');

    // Simpan URL gambar awal sebagai nilai default
    const defaultImageSrc = imagePreview.src;

    // Fungsi untuk menampilkan pratinjau gambar
    function showImagePreview(file) {
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    // Event listener ketika gambar diubah di input file
    imageInput.addEventListener('change', function () {
        const selectedFile = this.files[0];
        showImagePreview(selectedFile);
    });

    // Event listener untuk tombol reset
    resetButton.addEventListener('click', function () {
        // Kembalikan gambar ke gambar awal
        imagePreview.src = defaultImageSrc;
        // Reset nilai input file
        imageInput.value = '';
    });
</script>
@endsection
