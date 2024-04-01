@extends('layouts.app')

@section('title', 'Pilih Jurusan')

@section('content')

<div class="page-header">
    <h4 class="page-title">Pilih Jurusan</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="#">
                <i class="flaticon-home"></i>
            </a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title mb-0">
                    <i class="fas fa-money-bill"></i> Jurusan
                </div>
            </div>
            
            <div class="card-body">
                <div class="card-sub">
                    <div class="alert-title">Info</div>
                    <ul>
                        <li>Pilihan 1 : Adalah jurusan yang akan di prioritaskan untuk anda.</li>
                        <li>Pilihan 2 : Jika tidak diterima di pilihan ke-1, maka anda memiliki kesempatan untuk diterima di jurusan ke-2.</li>
                        <li>Pilihan 1 dan 2 wajib dipilih agar dapat melanjutkan ke langkah berikut nya.</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pilihan 1</label>
                            <div class="select2-input">
                                <select id="pilihan_1" name="pilihan_1" class="form-control" required>
                                    <option value="">--Pilih Salah Satu--</option>
                                    @foreach($jurusan as $j)
                                        <option value="{{ $j->id }}" {{ (isset($pilihanSiswa) && $pilihanSiswa->pilihan_1 == $j->id) ? 'selected' : '' }}>{{ $j->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pilihan 2</label>
                            <div class="select2-input">
                                <select id="pilihan_2" name="pilihan_2" class="form-control" required>
                                    <option value="">--Pilih Salah Satu--</option>
                                    @foreach($jurusan as $j)
                                        <option value="{{ $j->id }}" {{ (isset($pilihanSiswa) && $pilihanSiswa->pilihan_2 == $j->id) ? 'selected' : '' }}>{{ $j->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="" class="btn btn-success btn-sm"> LANJUT</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var siswaId = "{{ auth()->user()->id }}"; // ID siswa yang login
        var jurusanSudahDipilih = {{ $pilihanSiswa ? 'true' : 'false' }}; // Cek apakah siswa sudah memilih jurusan

        function pilihJurusan(pilihan1, pilihan2, jurusanSudahDipilih) {
            let pesan = jurusanSudahDipilih ? "Apakah Anda yakin akan merubah pilihan jurusan?" : "Apakah Anda yakin untuk memilih jurusan ini?";
            swal({
                title: "Konfirmasi",
                text: pesan,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willChange) => {
                if (willChange) {
                    $.ajax({
                        url: "{{ route('siswa.pilihjurusan.store') }}",
                        type: "POST",
                        data: {
                            pilihan_1: pilihan1,
                            pilihan_2: pilihan2,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if(response.success) {
                                swal("Berhasil!", response.success, "success")
                                .then((value) => {
                                    window.location.reload(); // Reload halaman setelah sukses
                                });
                            } else {
                                swal("Error!", response.error, "error");
                            }
                        },
                        error: function(xhr, status, error) {
                            var err = JSON.parse(xhr.responseText);
                            swal("Error!", err.message, "error");
                        }
                    });
                }
            });
        }

        // Event listener untuk pilihan jurusan
        $('#pilihan_1, #pilihan_2').on('change', function() {
            var pilihan1 = $('#pilihan_1').val();
            var pilihan2 = $('#pilihan_2').val();
            pilihJurusan(pilihan1, pilihan2, jurusanSudahDipilih);
        });
    });
</script>

@endsection
