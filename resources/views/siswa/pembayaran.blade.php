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
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title mb-0">
                    <i class="fas fa-money-bill"></i> Pembayaran
                </div>
                <!-- Tombol untuk memicu modal -->
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#infoPembayaranModal">
                    <i class="fas fa-info"></i> Info Pembayaran
                </button>
                <!-- Modal Info Pembayaran -->
                <div class="modal fade" id="infoPembayaranModal" tabindex="-1" role="dialog" aria-labelledby="infoPembayaranModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="infoPembayaranModalLabel">Info Pembayaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p style="font-family: Nunito, " segoe="" ui",="" arial;="" font-size:="" 14px;"=""><span style="font-family: Roboto;">Silahkan melakukan proses pembayaran melalui No Rekening dibawah ini :</span></p><p style="font-family: Nunito, " segoe="" ui",="" arial;="" font-size:="" 14px;"=""><span style="font-family: Roboto; font-weight: 700;">Nama Bank :&nbsp;</span><font face="Roboto"><b>Bank Mandiri</b></font></p><p style="font-family: Nunito, " segoe="" ui",="" arial;="" font-size:="" 14px;"=""><span style="font-weight: bolder; font-family: Roboto;">Nomor Rekening :&nbsp;</span><font face="Roboto"><b>9000044970722</b></font></p><p style="font-family: Nunito, " segoe="" ui",="" arial;="" font-size:="" 14px;"=""><span style="font-weight: bolder; font-family: Roboto;">A.N :&nbsp;</span><font face="Roboto"><b>Desy Nur anggita</b></font></p><p style="font-family: Nunito, " segoe="" ui",="" arial;="" font-size:="" 14px;"=""><span style="font-family: Roboto;">Setelah melakukan proses pembayaran harap konfirmasikan pembayaran di bawah ini.</span></p><p style="font-family: Nunito, " segoe="" ui",="" arial;="" font-size:="" 14px;"=""><span style="font-family: Roboto;">setelah itu akan dilakukan pengecekan dan verifikasi oleh Panitia PPDB SMK TELKOM LAMPUNG bagian keuangan.</span></p> </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

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
                                    <td>
                                        @if($bayar->status)
                                            <span class="badge badge-success">Sudah Diverifikasi</span>
                                        @else
                                            <span class="badge badge-warning">Sedang Diverifikasi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="editPembayaran('{{ $bayar->id }}')"><i class="far fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDeletion('{{ $bayar->id }}')"><i class="fas fa-trash"></i></button>
                                        <button type="button" onclick="window.open('{{ route('pembayaran.print', $bayar->id) }}')" class="btn btn-secondary btn-sm"><i class="fas fa-print"></i></button>
                                        <!-- Modal Edit Pembayaran -->
                                        <div class="modal fade" id="editPembayaranModal" tabindex="-1" role="dialog" aria-labelledby="editModelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form id="editPembayaranForm" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Pembayaran</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="biaya_id" id="edit_biaya_id" value="">
                                                            <input type="hidden" name="siswa_id" id="edit_siswa_id" value="">
                                                            <!-- Nama Biaya - Readonly -->
                                                            <div class="form-group">
                                                                <label for="edit_nama_biaya">Nama Biaya</label>
                                                                <input type="text" class="form-control" id="edit_nama_biaya" readonly>
                                                            </div>
                                                        
                                                            <!-- Jumlah Biaya - Readonly -->
                                                            <div class="form-group">
                                                                <label for="edit_jumlah_biaya">Jumlah Pembayaran</label>
                                                                <input type="text" class="form-control" id="edit_jumlah_biaya" readonly>
                                                            </div>

                                                            <!-- Nama Siswa - Readonly -->
                                                            <div class="form-group">
                                                                <label for="edit_nama_siswa">Nama Siswa</label>
                                                                <input type="text" class="form-control" id="edit_nama_siswa" readonly>
                                                            </div>

                                                            <!-- Tanggal Pembayaran -->
                                                            <div class="form-group">
                                                                <label for="edit_tgl_pembayaran">Tanggal Pembayaran</label>
                                                                <input type="date" class="form-control" name="tgl_pembayaran" id="edit_tgl_pembayaran" required>
                                                            </div>

                                                            <!-- Bukti Pembayaran -->
                                                            <div class="form-group">
                                                                <label for="edit_bukti_pembayaran">Bukti Pembayaran</label>
                                                                <!-- Tempat menampilkan gambar bukti pembayaran -->
                                                                <img id="edit_bukti_pembayaran_preview" src="" alt="Bukti Pembayaran" style="max-width: 100%; height: auto; margin-bottom: 10px; display: none;">
                                                                <input type="file" class="form-control" name="bukti_pembayaran" id="edit_bukti_pembayaran">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Update</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            var baseUrl = "{{ asset('uploads') }}/";
                                            function editPembayaran(id) {
                                                fetch(`/pembayaran/${id}/edit`)
                                                .then(response => response.json())
                                                .then(data => {
                                                    const modal = $('#editPembayaranModal');
                                                    // Isi form dengan data
                                                    modal.find('#edit_nama_biaya').val(data.biaya.nama_biaya);
                                                    modal.find('#edit_tgl_pembayaran').val(data.tgl_pembayaran);
                                                    modal.find('#edit_jumlah_biaya').val(`Rp ${parseFloat(data.biaya.jumlah_biaya).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ".")}`);
                                                    modal.find('#edit_nama_siswa').val(data.siswa.nama_lengkap);
                                                    modal.find('#edit_biaya_id').val(data.biaya.id);
                                                    modal.find('#edit_siswa_id').val(data.siswa.id);
                                                    if(data.bukti_pembayaran) {
                                                        const imageUrl = baseUrl + data.bukti_pembayaran; // Gunakan baseUrl yang telah disiapkan
                                                        modal.find('#edit_bukti_pembayaran_preview').attr('src', imageUrl).show();
                                                    } else {
                                                        modal.find('#edit_bukti_pembayaran_preview').hide(); // Sembunyikan jika tidak ada gambar
                                                    }
                                                    // Update action form untuk submit ke URL update pembayaran
                                                    $('#editPembayaranForm').attr('action', `/pembayaran/${id}`);
                                                    
                                                    // Tampilkan modal
                                                    modal.modal('show');
                                                })
                                                .catch(error => console.error('Error:', error));
                                            }
                                        </script>
                                        <script>
                                            function confirmDeletion(id) {
                                                swal({
                                                    title: 'Apakah anda yakin?',
                                                    text: "Akan membatalkan pembayaran ini!",
                                                    icon: 'warning',
                                                    buttons: {
                                                        cancel: {
                                                            visible: true,
                                                            text : 'No, cancel!',
                                                            className: 'btn btn-danger'
                                                        },
                                                        confirm: {
                                                            text : 'Yes, delete it!',
                                                            className : 'btn btn-success'
                                                        }
                                                    }
                                                }).then((willDelete) => {
                                                    if (willDelete) {
                                                        // Jika pengguna mengklik "Yes, delete it!", kirim permintaan penghapusan ke server
                                                        fetch(`/pembayaran/${id}`, {
                                                            method: 'POST',
                                                            headers: {
                                                                'Content-Type': 'application/json',
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            },
                                                            body: JSON.stringify({
                                                                _method: 'DELETE'
                                                            })
                                                        })
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            swal("Deleted! Pembayaran anda berhasil dibatalkan.", {
                                                                icon: "success",
                                                                buttons : {
                                                                    confirm : {
                                                                        className: 'btn btn-success'
                                                                    }
                                                                }
                                                            }).then(() => {
                                                                window.location.reload(); // Reload halaman setelah penghapusan untuk memperbarui view
                                                            });
                                                        })
                                                        .catch(error => console.error('Error:', error));
                                                    } else {
                                                        // Jika pengguna mengklik "No, cancel!", tampilkan notifikasi pembatalan
                                                        swal("Cancelled", "Your payment record is safe :)", {
                                                            buttons : {
                                                                confirm : {
                                                                    className: 'btn btn-success'
                                                                }
                                                            }
                                                        });
                                                    }
                                                });
                                            }
                                        </script>
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