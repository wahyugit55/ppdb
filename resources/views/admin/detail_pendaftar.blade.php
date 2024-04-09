@extends('layouts.app')

@section('title', 'Detail Pendaftar')

@section('content')

<div class="page-header">
    <h4 class="page-title">{{ $siswa->nama_lengkap }}</h4>
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
            <div class="card-header">
                <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-home-nobd" role="tab" aria-controls="pills-home-nobd" aria-selected="true"><i class="fas fa-user"></i> Data Diri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" href="#pills-profile-nobd" role="tab" aria-controls="pills-profile-nobd" aria-selected="false"><i class="fa fa-address-card" aria-hidden="true"></i> Alamat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#pills-contact-nobd" role="tab" aria-controls="pills-contact-nobd" aria-selected="false"><i class="fas fa-user-friends"></i> Data Orang Tua</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#pills-formulir-nobd" role="tab" aria-controls="pills-formulir-nobd" aria-selected="false"><i class="fas fa-user-friends"></i> Cetak Formulir</a>
                    </li>
                </ul>
                {{-- <div class="card-title"><i class="fas fa-user"></i> {{ $siswa->nama_lengkap }}</div>
                <div class="card-category">Admin dapat merubah detail pendaftar dibawah ini apabila terdapat data yang perlu diperbarui.</div> --}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
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
                                        <form action="{{ route('admin.biodata.store', ['siswaId' => $siswa->id]) }}" method="POST">
                                            @csrf
                                            <!-- Nomor Pendaftaran (readonly) -->
                                            <div class="form-group">
                                                <label for="no_pendaftaran">No. Pendaftaran</label>
                                                <input type="text" class="form-control" id="no_pendaftaran" name="no_pendaftaran" value="{{ $siswa->no_pendaftaran ?? '' }}" readonly>
                                            </div>
                
                                            <div class="form-group">
                                                <label>Pilihan Jurusan 1</label>
                                                <input type="text" class="form-control" value="{{ $siswa->pilihJurusan->jurusanPilihan1->nama_jurusan ?? 'Tidak tersedia' }}" readonly>
                                                <small class="form-text text-muted">Untuk merubah jurusan melalui menu jurusan</small>
                                            </div>
                                            <div class="form-group">
                                                <label>Pilihan Jurusan 2</label>
                                                <input type="text" class="form-control" value="{{ $siswa->pilihJurusan->jurusanPilihan2->nama_jurusan ?? 'Tidak tersedia' }}" readonly>
                                                <small class="form-text text-muted">Untuk merubah jurusan melalui menu jurusan</small>
                                            </div>
                                            
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
                                                    <option value="{{ $ukuran }}" {{ (isset($siswa) && $siswa->dataDiri->ukuran_baju == $ukuran) ? 'selected' : '' }}>{{ $ukuran }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                
                                        <!-- NIK -->
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" class="form-control" id="nik" name="nik" value="{{ $siswa->dataDiri->nik ?? '' }}" required>
                                        </div>
                
                                        <!-- Tempat Lahir -->
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $siswa->dataDiri->tempat_lahir ?? '' }}" required>
                                        </div>
                
                                        <!-- Tanggal Lahir -->
                                        <div class="form-group">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $siswa->dataDiri->tgl_lahir ?? '' }}" required>
                                        </div>
                
                                        <!-- Jenis Kelamin -->
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                                                <option value="">--Pilih Jenis Kelamin--</option>
                                                @foreach(['Laki-laki', 'Perempuan'] as $jenis_kelamin)
                                                    <option value="{{ $jenis_kelamin }}" {{ (isset($siswa) && $siswa->dataDiri->jenis_kelamin == $jenis_kelamin) ? 'selected' : '' }}>{{ $jenis_kelamin }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                
                                        <!-- Agama -->
                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <select id="agama" name="agama" class="form-control" required>
                                                <option value="">--Pilih Agama--</option>
                                                @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'] as $agama)
                                                    <option value="{{ $agama }}" {{ (isset($siswa) && $siswa->dataDiri->agama == $agama) ? 'selected' : '' }}>{{ $agama }}</option>
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
                                </form>
                                </div>
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
                                        <form id="alamatForm">

                                            @csrf

                                            <div class="form-group">
                                                <label for="alamat">Alamat Tinggal</label>
                                                <input type="text" name="alamat" class="form-control" value="{{ $siswa->alamat->alamat ?? '' }}" placeholder="Masukan alamat tinggal saat ini" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="rt">RT</label>
                                                <input type="text" name="rt" class="form-control" value="{{ $siswa->alamat->rt ?? '' }}" placeholder="Masukan RT" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="rw">RW</label>
                                                <input type="text" name="rw" class="form-control" value="{{ $siswa->alamat->rw ?? '' }}" placeholder="Masukan RW" required>
                                            </div>

                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        

                                            <div class="form-group">
                                                <label for="province_id">Provinsi</label>
                                                <select id="province_id" name="province_id" class="form-control" required>
                                                    <option value="">Pilih Provinsi</option>
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}" {{ $selectedProvinceId == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
                                                    @endforeach
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
                                            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                                        </div>
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
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <form id="orangtuaForm">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_ayah">Nama Ayah</label>
                                                <input type="text" name="nama_ayah" class="form-control" value="{{ $siswa->orangTua->nama_ayah ?? '' }}" placeholder="Masukan nama ayah" required>
                                            </div>
    
                                            <div class="form-group">
                                                <label for="no_hp_ayah">No HP Ayah</label>
                                                <input type="text" name="no_hp_ayah" class="form-control" value="{{ $siswa->orangTua->no_hp_ayah ?? '' }}" placeholder="Masukan nomor hp ayah" required>
                                            </div>
    
                                            <div class="form-group">
                                                <label for="nama_ibu">Nama Ibu</label>
                                                <input type="text" name="nama_ibu" class="form-control" value="{{ $siswa->orangTua->nama_ibu ?? '' }}" placeholder="Masukan nama ibu" required>
                                            </div>
    
                                            <div class="form-group">
                                                <label for="no_hp_ibu">No HP Ibu</label>
                                                <input type="text" name="no_hp_ibu" class="form-control" value="{{ $siswa->orangTua->no_hp_ibu ?? '' }}" placeholder="Masukan nomor hp ibu" required>
                                            </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-formulir-nobd" role="tabpanel" aria-labelledby="pills-formulir-tab-nobd">
                                <div class="card-sub">
                                    <div class="alert-title">Info</div>
                                    <ul>
                                        <li>Silahkan cetak formulir pendaftaran melalui tombol dibawah ini, formulir wajib dicetak atau di download karena didalamnya terdapat informasi akun cbt yang akan digunakan untuk login seleksi PPDB pada tahap berikutnya</li>
                                        <li>Tombol Cetak Formulir hanya akan aktif apabila seluruh isian form  sudah lengkap dan terverifikasi</li>
                                        <li>Apabila ada pertanyaan bisa menghubungi admin ppdb melalui nomor berikut : 08117208814</li>
                                    </ul>
                                </div>
                                <div class="text-center">
                                    <a href="mod_formulir/print_daftar.php?id=K0owYVZ5QVRxZzRrbVg1MWVuMlR5UT09" type="button" class="btn btn-danger btn-lg"><i class="fas fa-print    "></i> Cetak Formulir</a>
                                </div>
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

    var selectedProvinceId = "{{ $selectedProvinceId }}";
    var selectedRegencyId = "{{ $selectedRegencyId }}";
    var selectedDistrictId = "{{ $selectedDistrictId }}";
    var selectedVillageId = "{{ $selectedVillageId }}";

    function loadDropdown(selector, url, selectedId = null, callback = null) {
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function(results) {
                var options = '<option value="">Pilih...</option>';
                results.forEach(function(item) {
                    var isSelected = item.id == selectedId ? ' selected' : '';
                    options += `<option value="${item.id}"${isSelected}>${item.name}</option>`;
                });
                $(selector).html(options);
                if(callback) callback();
            }
        });
    }

    // Inisialisasi untuk provinsi
    if(selectedProvinceId) {
        loadDropdown('#province_id', `/admin/get-provinces`, selectedProvinceId, function() {
            $('#province_id').val(selectedProvinceId).change(); // Trigger change untuk memuat kabupaten
        });
    }

    $('#province_id').change(function() {
        var provinceId = $(this).val();
        loadDropdown('#regency_id', `/admin/get-regencies/${provinceId}`, selectedRegencyId, function() {
            if(selectedRegencyId && provinceId == selectedProvinceId) {
                $('#regency_id').val(selectedRegencyId).change(); // Trigger change untuk memuat kecamatan
            }
        });
    });

    $('#regency_id').change(function() {
        var regencyId = $(this).val();
        loadDropdown('#district_id', `/admin/get-districts/${regencyId}`, selectedDistrictId, function() {
            if(selectedDistrictId && regencyId == selectedRegencyId) {
                $('#district_id').val(selectedDistrictId).change(); // Trigger change untuk memuat desa
            }
        });
    });

    $('#district_id').change(function() {
        var districtId = $(this).val();
        loadDropdown('#village_id', `/admin/get-villages/${districtId}`, selectedVillageId);
    });

    // Jika Provinsi telah terpilih saat form dimuat, pemicu perubahan untuk memuat Kabupaten/Kota, Kecamatan, dan Desa
    if ($('#province_id').val()) $('#province_id').change();

        // Menangani ketika form disubmit
        $('#alamatForm').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.alamat.store', ['siswaId' => $siswa->id]) }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    if(response.success) {
                        swal("Berhasil!", "Data alamat berhasil disimpan.", "success");
                    } else {
                        swal("Gagal!", "Terjadi kesalahan saat menyimpan data.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    swal("Gagal!", "Terjadi kesalahan saat menyimpan data.", "error");
                }
            });
        });

        $('#orangtuaForm').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.orangtua.store', ['siswaId' => $siswa->id]) }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    if(response.success) {
                        swal("Berhasil!", "Data orang tua berhasil disimpan.", "success");
                    } else {
                        swal("Gagal!", "Terjadi kesalahan saat menyimpan data.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    swal("Gagal!", "Terjadi kesalahan saat menyimpan data.", "error");
                }
            });
        });

    });
</script>
@endsection