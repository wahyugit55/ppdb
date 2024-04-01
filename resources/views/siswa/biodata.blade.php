@extends('layouts.app')

@section('title', 'Biodata')

@section('content')

<div class="page-header">
    <h4 class="page-title">Biodata</h4>
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
                <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-home-nobd" role="tab" aria-controls="pills-home-nobd" aria-selected="true"><i class="fas fa-user"></i> Data Diri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" href="#pills-profile-nobd" role="tab" aria-controls="pills-profile-nobd" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#pills-contact-nobd" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Contact</a>
                    </li>
                </ul>
            </div>
            
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                            <div class="tab-pane fade show active" id="pills-home-nobd" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                                <div class="card-sub">
                                    <div class="alert-title">Info</div>
                                    <ul>
                                        <li>Seluruh form data diri wajib di lengkapi, jika sudah terisi silahkan klik tombol simpan data diri dibagian paling bawah</li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <form action="{{ route('siswa.biodata.store') }}" method="POST">
                                            @csrf
                                            <!-- Nomor Pendaftaran (readonly) -->
                                            <div class="form-group">
                                                <label for="no_pendaftaran">No. Pendaftaran</label>
                                                <input type="text" class="form-control" id="no_pendaftaran" name="no_pendaftaran" value="{{ $siswa->no_pendaftaran ?? '' }}" readonly>
                                            </div>

                                            @if($pilihanJurusan)
                                                <div class="form-group">
                                                    <label>Pilihan Jurusan 1</label>
                                                    <input type="text" class="form-control" value="{{ $pilihanJurusan->jurusanPilihan1->nama_jurusan ?? 'Tidak tersedia' }}" readonly>
                                                    <small class="form-text text-muted">Untuk merubah jurusan melalui menu jurusan</small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pilihan Jurusan 2</label>
                                                    <input type="text" class="form-control" value="{{ $pilihanJurusan->jurusanPilihan2->nama_jurusan ?? 'Tidak tersedia' }}" readonly>
                                                    <small class="form-text text-muted">Untuk merubah jurusan melalui menu jurusan</small>
                                                </div>
                                            @endif
                                            
                                            <!-- NISN -->
                                            <div class="form-group">
                                                <label for="nisn">NISN</label>
                                                <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $siswa->nisn ?? '' }}" required>
                                            </div>

                                            <!-- Nama Lengkap -->
                                            <div class="form-group">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $siswa->nama_lengkap ?? '' }}" required>
                                            </div>

                                            <!-- Jenis Sekolah Asal -->
                                            <div class="form-group">
                                                <label for="jenis_sekolah">Jenis Sekolah Asal</label>
                                                <select id="jenis_sekolah" name="jenis_sekolah" class="form-control" required>
                                                    <option value="">--Pilih Jenis Sekolah Asal--</option>
                                                    @foreach(['SMP', 'MTs', 'Paket', 'Pondok'] as $jenis)
                                                        <option value="{{ $jenis }}" {{ (isset($siswa) && $siswa->jenis_sekolah == $jenis) ? 'selected' : '' }}>{{ $jenis }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Asal Sekolah -->
                                            <div class="form-group">
                                                <label for="asal_sekolah">Asal Sekolah</label>
                                                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="{{ $siswa->asal_sekolah ?? '' }}" required>
                                            </div>

                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <!-- Nomor HP -->
                                        <div class="form-group">
                                            <label for="nomor_hp">Nomor HP</label>
                                            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ $siswa->nomor_hp ?? '' }}" required>
                                        </div>

                                        <!-- Ukuran Baju -->
                                        <div class="form-group">
                                            <label for="ukuran_baju">Ukuran Baju</label>
                                            <select id="ukuran_baju" name="ukuran_baju" class="form-control" required>
                                                <option value="">--Pilih Ukuran Baju--</option>
                                                @foreach(['S', 'M', 'L', 'XL', 'XXL', 'XXXL'] as $ukuran)
                                                    <option value="{{ $ukuran }}" {{ (isset($dataDiri) && $dataDiri->ukuran_baju == $ukuran) ? 'selected' : '' }}>{{ $ukuran }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- NIK -->
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" class="form-control" id="nik" name="nik" value="{{ $dataDiri->nik ?? '' }}" required>
                                        </div>

                                        <!-- Tempat Lahir -->
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $dataDiri->tempat_lahir ?? '' }}" required>
                                        </div>

                                        <!-- Tanggal Lahir -->
                                        <div class="form-group">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $dataDiri->tgl_lahir ?? '' }}" required>
                                        </div>

                                        <!-- Jenis Kelamin -->
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                                                <option value="">--Pilih Jenis Kelamin--</option>
                                                @foreach(['Laki-laki', 'Perempuan'] as $jenis_kelamin)
                                                    <option value="{{ $jenis_kelamin }}" {{ (isset($dataDiri) && $dataDiri->jenis_kelamin == $jenis_kelamin) ? 'selected' : '' }}>{{ $jenis_kelamin }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Agama -->
                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <select id="agama" name="agama" class="form-control" required>
                                                <option value="">--Pilih Agama--</option>
                                                @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'] as $agama)
                                                    <option value="{{ $agama }}" {{ (isset($dataDiri) && $dataDiri->agama == $agama) ? 'selected' : '' }}>{{ $agama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>
                                
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <div class="tab-pane fade" id="pills-profile-nobd" role="tabpanel" aria-labelledby="pills-profile-tab-nobd">
                                <div class="card-sub">
                                    <div class="alert-title">Info</div>
                                    <ul>
                                        <li>Seluruh form data diri wajib di lengkapi, jika sudah terisi silahkan klik tombol simpan data diri dibagian paling bawah</li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <form id="alamatForm" data-saved-province="{{ $alamat->province_id ?? '' }}" data-saved-regency="{{ $alamat->regency_id ?? '' }}" data-saved-district="{{ $alamat->district_id ?? '' }}" data-saved-village="{{ $alamat->village_id ?? '' }}">

                                            @csrf
                                            <div class="form-group">
                                                <label for="province_id">Provinsi</label>
                                                <select id="province_id" name="province_id" class="form-control" required>
                                                    <option value="">Pilih Provinsi</option>
                                                    <!-- Options diisi oleh JavaScript -->
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="regency_id">Kabupaten/Kota</label>
                                                <select id="regency_id" name="regency_id" class="form-control" required>
                                                    <option value="">Pilih Kabupaten/Kota</option>
                                                    <!-- Options diisi oleh JavaScript -->
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="district_id">Kecamatan</label>
                                                <select id="district_id" name="district_id" class="form-control" required>
                                                    <option value="">Pilih Kecamatan</option>
                                                    <!-- Options diisi oleh JavaScript -->
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="village_id">Desa</label>
                                                <select id="village_id" name="village_id" class="form-control" required>
                                                    <option value="">Pilih Desa</option>
                                                    <!-- Options diisi oleh JavaScript -->
                                                </select>
                                            </div>                                        
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact-nobd" role="tabpanel" aria-labelledby="pills-contact-tab-nobd">
                                <div class="card-sub">
                                    <div class="alert-title">Info</div>
                                    <ul>
                                        <li>Seluruh form data diri wajib di lengkapi, jika sudah terisi silahkan klik tombol simpan data diri dibagian paling bawah</li>
                                    </ul>
                                </div>
                                <p>Pityful a rethoric question ran over her cheek, then she continued her way. On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country.</p>

                                <p> But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
<script>
    $(document).ready(function() {

        function loadRegencies(provinceId, savedRegency) {
            $('#regency_id').empty().append('<option value="">Pilih Kabupaten/Kota</option>');
            $.ajax({
                url: "{{ url('/get-regencies') }}/" + provinceId,
                type: "GET",
                dataType: "json",
                success: function(regencies) {
                    regencies.forEach(function(regency) {
                        $('#regency_id').append(new Option(regency.name, regency.id));
                    });
                    if(savedRegency) {
                        $('#regency_id').val(savedRegency).change();
                    }
                }
            });
        }
        // Memuat Provinsi dan setel default jika ada
        $.ajax({
            url: "{{ route('get-provinces') }}",
            type: "GET",
            dataType: "json",
            success: function(provinces) {
                provinces.forEach(function(province) {
                    $('#province_id').append(new Option(province.name, province.id));
                });
                var savedProvince = $('#alamatForm').data('saved-province');
                if(savedProvince) {
                    $('#province_id').val(savedProvince).change();
                }
            }
        });
    
        // Ketika provinsi berubah
        $('#province_id').on('change', function() {
            var provinceId = $(this).val();
            loadRegencies(provinceId, $('#alamatForm').data('saved-regency'));
            $('#regency_id').empty().append('<option value="">Pilih Kabupaten/Kota</option>');
            $('#district_id').empty().append('<option value="">Pilih Kecamatan</option>');
            $('#village_id').empty().append('<option value="">Pilih Desa</option>');
    
            // AJAX request untuk mendapatkan kabupaten/kota berdasarkan provinsi
            $.ajax({
                url: "{{ url('/get-regencies') }}/" + provinceId,
                type: "GET",
                dataType: "json",
                success: function(regencies) {
                    regencies.forEach(function(regency) {
                        $('#regency_id').append(new Option(regency.name, regency.id));
                    });
                }
            });
        });
    
        // Ketika kabupaten/kota berubah
        $('#regency_id').on('change', function() {
            var regencyId = $(this).val();
            $('#district_id').empty().append('<option value="">Pilih Kecamatan</option>');
            $('#village_id').empty().append('<option value="">Pilih Desa</option>');
    
            // AJAX request untuk mendapatkan kecamatan berdasarkan kabupaten/kota
            $.ajax({
                url: "{{ url('/get-districts') }}/" + regencyId,
                type: "GET",
                dataType: "json",
                success: function(districts) {
                    districts.forEach(function(district) {
                        $('#district_id').append(new Option(district.name, district.id));
                    });
                }
            });
        });
    
        // Ketika kecamatan berubah
        $('#district_id').on('change', function() {
            var districtId = $(this).val();
            $('#village_id').empty().append('<option value="">Pilih Desa</option>');
    
            // AJAX request untuk mendapatkan desa berdasarkan kecamatan
            $.ajax({
                url: "{{ url('/get-villages') }}/" + districtId,
                type: "GET",
                dataType: "json",
                success: function(villages) {
                    villages.forEach(function(village) {
                        $('#village_id').append(new Option(village.name, village.id));
                    });
                }
            });
        });

        // Menangani ketika form disubmit
        $('#alamatForm').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize(); // Mengambil data dari form

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('alamat.store') }}", // Ganti dengan URL endpoint Anda
                type: "POST",
                data: formData,
                success: function(response) {
                    if(response.success) {
                        // Menampilkan Sweet Alert sukses
                        swal("Berhasil!", "Data alamat berhasil disimpan.", "success");
                    } else {
                        // Menampilkan Sweet Alert error
                        swal("Gagal!", "Terjadi kesalahan saat menyimpan data.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    // Menampilkan Sweet Alert error
                    swal("Gagal!", "Terjadi kesalahan saat menyimpan data.", "error");
                }
            });
        });

    });
</script>
    
@endsection