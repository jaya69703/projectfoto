@extends('base.base-index')
@section('custom-css')
<style>

    .form-filter {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .form-filter input {
        flex: 1;
      }

      .form-filter button {
        margin-left: 10px;
      }
</style>
@endsection
@section('content')
<div class="row layout-top-spacing">
    <div class="col-lg-12 col-12 mb-3">
        <div class="card">
            <div class="card-header">
                <span style="font-size: 20px">Rekap Data Member</span>
            </div>

            <div class="row card-body">
                <div class="col-lg-6 form-group">
                    <form action="{{ route('sadmin.member.filter') }}" method="GET" id="form-filter">
                        <label for="month">Pilih Bulan</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <select name="month" id="month" class="form-select">
                                <option value="" {{ request('month') == '' ? 'selected' : '' }}>Semua Bulan</option>
                                <option value="1" {{ request('month') == '1' ? 'selected' : '' }}>Januari</option>
                                <option value="2" {{ request('month') == '2' ? 'selected' : '' }}>Februari</option>
                                <option value="3" {{ request('month') == '3' ? 'selected' : '' }}>Maret</option>
                                <option value="4" {{ request('month') == '4' ? 'selected' : '' }}>April</option>
                                <option value="5" {{ request('month') == '5' ? 'selected' : '' }}>Mei</option>
                                <option value="6" {{ request('month') == '6' ? 'selected' : '' }}>Juni</option>
                                <option value="7" {{ request('month') == '7' ? 'selected' : '' }}>Juli</option>
                                <option value="8" {{ request('month') == '8' ? 'selected' : '' }}>Agustus</option>
                                <option value="9" {{ request('month') == '9' ? 'selected' : '' }}>September</option>
                                <option value="10" {{ request('month') == '10' ? 'selected' : '' }}>Oktober</option>
                                <option value="11" {{ request('month') == '11' ? 'selected' : '' }}>November</option>
                                <option value="12" {{ request('month') == '12' ? 'selected' : '' }}>Desember</option>
                            </select>
                            @php
                                $month = "2023-10"; // Ganti dengan nilai bulan yang sesuai
                            @endphp
                            @if (old('month') && !in_array(old('month'), [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]))
                                <span class="text-danger">Bulan yang dipilih tidak valid.</span>
                            @endif
                            <button type="submit" class="btn btn-primary btn-rounded" style="margin-left: 10px"><i class="fa-solid fa-sort"></i></button>
                            @if(request('month'))
                            <a href="{{ route('sadmin.report-member.download', ['month' => request('month'), 'format' => 'pdf']) }}" class="btn btn-primary btn-rounded" style="margin-left: 5px;"><i class="fa-solid fa-print"></i></a>

                            @endif
                        </div>
                    </form>
                </div>

                <div class="col-lg-12 col-12 mt-4">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama Member</th>
                                    <th>Alamat Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Waktu Daftar</th>
                                </tr>
                            </thead>
                            <tbody id="table-transaksi">
                                @php
                                $newMember = 0; // Inisialisasi total pendapatan
                                @endphp
                                @foreach ($member as $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        @if($item->created_at)
                                        <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td> <!-- Menggunakan format yang diinginkan, contohnya 'd/m/Y H:i:s' -->
                                        @else
                                        <td>No Data</td>
                                        @endif
                                    </tr>
                                    @php
                                    $newMember++;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="4">Jumlah Member Baru</td>
                                    <td colspan="1">{{ $newMember }}  Member</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
<script>
    document.getElementById('month').onchange = function() {
        if (this.value !== '') {
            window.location.href = '{{ route("sadmin.member.filter") }}?month=' + this.value;
        } else {
            window.location.href = '{{ route("sadmin.member.all") }}';
        }
    };
</script>
@endsection
