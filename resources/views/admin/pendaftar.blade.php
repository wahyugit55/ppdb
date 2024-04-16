@extends('layouts.app')

@section('title', 'Pendaftar')

@section('content')

<div class="page-header">
    <h4 class="page-title">Data Pendaftar</h4>
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
                <div class="card-title"><i class="fas fa-users"></i> Data Pendaftar</div>
                <div class="collapse" id="search-nav">
                    <form class="navbar-left navbar-form nav-search mr-md-3" method="GET">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-search pr-1">
                                    <i class="fa fa-search search-icon"></i>
                                </button>
                            </div>
                            <input type="text" name="search" placeholder="Search ..." class="form-control" value="{{ request()->search }}">
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <table class="table table-responsive table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Pendaftaran</th>
                                    <th>Nama Pendaftar</th>
                                    <th>Asal Sekolah</th>
                                    <th>No HP</th>
                                    <th>Bayar Pendaftaran</th>
                                    <th>Status</th>
                                    <th>Daftar Ulang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswas as $siswa)                                
                                <tr>
                                    <td></td>
                                    <td>{{ $siswa->no_pendaftaran }}</td>
                                    <td>{{ $siswa->nama_lengkap }}</td>
                                    <td>{{ $siswa->asal_sekolah }}</td>
                                    <td>{{ $siswa->nomor_hp }}</td>
                                    <td>
                                        <span class="badge {{ $siswa->sudahBayarPendaftaran ? 'badge-success' : 'badge-danger' }}">
                                            {{ $siswa->sudahBayarPendaftaran ? 'Sudah Membayar Pendaftaran' : 'Belum Membayar Pendaftaran' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($siswa->verifikasiFormulir)
                                            @if($siswa->verifikasiFormulir->status_verifikasi == 0)
                                                <span class="badge badge-danger">Unverified</span>
                                            @elseif($siswa->verifikasiFormulir->status_verifikasi == 1)
                                                <span class="badge badge-success">Verifikasi</span>
                                            @endif
                                        @else
                                            <span class="badge badge-warning">Belum Verifikasi</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($siswa->sudahDaftarUlang)
                                            <span class="badge badge-success">Sudah Daftar Ulang</span>
                                        @else
                                            <span class="badge badge-danger">Belum Daftar Ulang</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.pendaftar.show', $siswa->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <ul class="pagination pg-primary">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
