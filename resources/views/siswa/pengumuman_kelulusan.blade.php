@extends('layouts.app')

@section('title', 'Pengumuman Kelulusan')

@section('content')

<div class="page-header">
    <h4 class="page-title">Pengumuman Kelulusan</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="#">
                <i class="flaticon-home"></i>
            </a>
        </li>
    </ul>
</div>
@foreach($pengumumanKelulusans as $pengumuman)
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title mb-0">
                    <i class="fas fa-money-bill"></i> Pengumuman Kelulusan
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="nama_siswa">Nama Calon Siswa</label>
                            <input type="text" class="form-control" value="{{ $pengumuman->siswa->nama_lengkap }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="no_pendaftaran">Nomor Pendaftaran</label>
                            <input type="text" class="form-control" value="{{ $pengumuman->siswa->no_pendaftaran }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control" value="{{ $pengumuman->siswa->nisn }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="asal_sekolah">Asal Sekolah</label>
                            <input type="text" class="form-control" value="{{ $pengumuman->siswa->asal_sekolah }}" readonly>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="status_kelulusan">Status Kelulusan</label>
                            @if($pengumuman->status_kelulusan == 1)
                                <div class="alert alert-success">
                                    SELAMAT ANDA DINYATAKAN LULUS
                                </div>
                            @elseif($pengumuman->status_kelulusan == 0)
                                <div class="alert alert-danger">
                                    MOHON MAAF ANDA DINYATAKAN TIDAK LULUS !
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="download_surat">Cetak Surat Kelulusan</label>
                            <div>
                                <a href="" class="btn btn-md btn-success"><i class="fas fa-print"> Download</i></a>
                            </div>
                            <small class="form-text text-muted">Silahkan download / cetak surat keterangan kelulusan melalui tombol diatas</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card-footer">
                <a href="" class="btn btn-success btn-sm"> LANJUT</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title mb-0">
                    <i class="fas fa-money-bill"></i> Rekap Hasil Seleksi PPDB
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card-sub">
                            Dibawah ini merupakan rekap hasil rangkaian seleksi ppdb yang telah di ikuti oleh {{ $pengumuman->siswa->nama_lengkap }} pada tanggal {{ $pengumuman->siswaJadwalSeleksi->jadwalSeleksi->tgl_seleksi }}.
                        </div>
                        <table class="table table-striped table-hover table-bordered">
                            <tbody>
                                <tr>
                                    <td>Nilai Tes Potensi Akademik (TPA)</td>
                                    <td>:</td>
                                    <td><div class="badge badge-info">{{ $pengumuman->hasilSeleksi->nilai_tpa }}</div></td>
                                </tr>
                                <tr>
                                    <td>Nilai Wawancara</td>
                                    <td>:</td>
                                    <td><div class="badge badge-info">{{ $pengumuman->hasilSeleksi->nilai_wawancara }}</div></td>
                                </tr>
                                @if(strtolower($akunSiswa->dataDiri->agama) === 'islam')
                                    <tr>
                                        <td>Nilai Membaca Al-Qur'an</td>
                                        <td>:</td>
                                        <td><div class="badge badge-info">{{ $pengumuman->hasilSeleksi->nilai_agama }}</div></td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Nilai Tes Buta Warna</td>
                                    <td>:</td>
                                    <td><div class="badge badge-info">{{ $pengumuman->hasilSeleksi->nilai_buta_warna }}</div></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
