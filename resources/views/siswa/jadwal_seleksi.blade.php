@extends('layouts.app')

@section('title', 'Jadwal Seleksi')

@section('content')

<div class="page-header">
    <h4 class="page-title">Jadwal Seleksi</h4>
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
                    <i class="fa fa-calendar" aria-hidden="true"></i> Jadwal Seleksi PPDB SMK TELKOM LAMPUNG
                </div>
            </div>
            
            <div class="card-body">
                {{-- <div class="card-sub">
                    <div class="alert-title">Info</div>
                    <ul>
                        <li>Pilihan 1 : Adalah jurusan yang akan di prioritaskan untuk anda.</li>
                        <li>Pilihan 2 : Jika tidak diterima di pilihan ke-1, maka anda memiliki kesempatan untuk diterima di jurusan ke-2.</li>
                        <li>Pilihan 1 dan 2 wajib dipilih agar dapat melanjutkan ke langkah berikut nya.</li>
                    </ul>
                </div> --}}
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        @if($jadwalSeleksi->isEmpty())
                            <div class="alert alert-info" role="alert">
                                Jadwal seleksi belum diterbitkan, silahkan pantau terus halaman ini.
                            </div>
                        @else
                            <table class="table table-bordered table-bordered-bd-warning mt-4">
                                <tbody>
                                    @foreach ($jadwalSeleksi as $jadwal)
                                        <tr>
                                            <td>Tanggal Seleksi</td>
                                            <td style="text-align: center; width: 1%; white-space: nowrap;">:</td>
                                            <td>{{ $jadwal->tgl_seleksi ? $jadwal->tgl_seleksi->format('d M Y H:i') : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lokasi Seleksi</td>
                                            <td>:</td>
                                            <td>{{ $jadwal->lokasi_seleksi ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Link Seleksi</td>
                                            <td>:</td>
                                            <td>
                                                @if ($jadwal->link_seleksi)
                                                    <a href="{{ $jadwal->link_seleksi }}" target="_blank"><i class="fas fa-external-link-alt"></i> Link</a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Username & Password</td>
                                            <td>:</td>
                                            <td><button class="btn btn-sm btn-black">
                                                <span class="btn-label">
                                                    <i class="fa fa-print"></i>
                                                </span>
                                                Lihat di Cetak Formulir
                                            </button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="" class="btn btn-success btn-sm"> LANJUT</a>
            </div>
        </div>
    </div>
</div>

@endsection
