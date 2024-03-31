@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')

<div class="page-header">
    <h4 class="page-title">Pembayaran</h4>
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
                <div class="card-title"><i class="fas fa-money-bill"></i> Pembayaran</div>
            </div>
            <div class="card-body">
                <div class="card-sub">
                    <div class="alert-title">Info</div>
                    <ul>
                        <li>Silahkan lakukan pembayaran biaya pendaftaran dibawah ini sebelum melanjutkan proses pendaftaran berikutnya.</li>
                        <li>Untuk melakukan tambah pembayaran silahkan klik tombol <strong>Tambah Pembayaran</strong> warna hijau</li>
                        <li>Untuk melihat status pembayaran silahkan lihat pada bagian <strong>Status Pembayaran</strong></li>
                        <li>Untuk melakukan pembatalan pembayaran silahkan klik tombol <strong><i class="fas fa-trash"></i></strong> warna merah</li>
                    </ul>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Biaya</th>
                                <th>Jumlah Biaya</th>
                                <th>No. Transaksi</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Status Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Kondisi jika ada data pembayaran --}}
                            @forelse ($pembayaran as $index => $bayar)
                                <tr>
                                    <th>{{ $index + 1 }}</th>
                                    <td>{{ $bayar->biaya->nama_biaya }}</td>
                                    <td>Rp {{ number_format($bayar->biaya->jumlah_biaya, 2, ',', '.') }}</td>
                                    <td>{{ $bayar->kode_transaksi }}</td>
                                    <td>{{ $bayar->tgl_pembayaran->format('d-m-Y') }}</td>
                                    <td>{{ $bayar->status ? 'Lunas' : 'Belum Lunas' }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="editPembayaran('{{ $bayar->id }}')"><i class="far fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="hapusPembayaran('{{ $bayar->id }}')"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @empty
                                {{-- Kondisi jika belum ada transaksi --}}
                                @foreach ($biayaWajib as $index => $biaya)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $biaya->nama_biaya }}</td>
                                    <td>Rp {{ number_format($biaya->jumlah_biaya, 2, ',', '.') }}</td>
                                    <td>Belum ada transaksi</td>
                                    <td>Belum ada transaksi</td>
                                    <td>Belum melakukan pembayaran</td>
                                    <td>
                                        {{-- Tombol Tambah hanya muncul jika belum ada pembayaran --}}
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahPembayaranModal">
                                            <i class="fas fa-plus-square"></i> Tambah Pembayaran
                                        </button>
                                        
                                        <!-- Modal Tambah Pembayaran -->
                                        <div class="modal fade" id="tambahPembayaranModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"><i class="fas fa-plus-square"></i> Tambah Pembayaran</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Form fields -->
                                                            <!-- Nama Biaya - Readonly -->
                                                            <div class="form-group">
                                                                <label for="nama_biaya">Nama Biaya</label>
                                                                <input type="text" class="form-control" id="nama_biaya" value="{{ $namaBiaya }}" readonly>
                                                                <!-- Sembunyikan biaya_id untuk dikirimkan -->
                                                                <input type="hidden" name="biaya_id" value="{{ $biayaId }}">
                                                            </div>

                                                            <!-- Jumlah Biaya - Readonly -->
                                                            <div class="form-group">
                                                                <label for="jumlah_biaya">Jumlah Pembayaran</label>
                                                                <input type="text" class="form-control" id="jumlah_biaya" value="Rp {{ number_format($jumlahBiaya, 2, ',', '.') }}" readonly>
                                                            </div>
                                                            
                                                            <!-- Nama Siswa - Readonly -->
                                                            <div class="form-group">
                                                                <label for="nama_siswa">Nama Siswa</label>
                                                                <input type="text" class="form-control" id="nama_siswa" value="{{ auth()->user()->nama_lengkap }}" readonly>
                                                                <!-- Sembunyikan siswa_id untuk dikirimkan -->
                                                                <input type="hidden" name="siswa_id" value="{{ auth()->user()->id }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tgl_pembayaran">Tanggal Pembayaran</label>
                                                                <input type="date" class="form-control" name="tgl_pembayaran" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="bukti_pembayaran">Bukti Pembayaran</label>
                                                                <input type="file" class="form-control" name="bukti_pembayaran">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Simpan</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @endforelse
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
