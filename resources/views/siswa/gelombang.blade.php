@extends('layouts.app')

@section('title', 'Pilih Gelombang')

@section('content')

<div class="page-header">
    <h4 class="page-title">Pilih Gelombang</h4>
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
                    <i class="fas fa-money-bill"></i> Gelombang
                </div>
            </div>
            
            <div class="card-body">
                <div class="card-sub">
                    <div class="alert-title">Info</div>
                    <ul>
                        <li>Silahkan pilih gelombang pendaftaran dibawah ini.</li>
                    </ul>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama Gelombang</th>
                                <th>Tgl. Dibuka</th>
                                <th>Tgl. Ditutup</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gelombang as $g)
                                <tr>
                                    <td>{{ $g->nama_gelombang }}</td>
                                    <td><span class="badge badge-success">{{ $g->tgl_dibuka->format('d-m-Y') }}</span></td>
                                    <td><span class="badge badge-success">{{ $g->tgl_ditutup->format('d-m-Y') }}</span></td>
                                    <td>
                                        @if($sudahMemilihGelombang)
                                            <button class="btn btn-secondary" disabled><i class="fas fa-sign-in-alt"></i> {{ $g->id == $gelombangDipilihId ? 'Sudah Memilih' : 'Ditutup' }}</button>
                                        @else
                                            @if($g->status)
                                                <button class="btn btn-primary pilihGelombang" data-gelombang="{{ $g->id }}"><i class="fas fa-sign-in-alt"></i> Pilih</button>
                                            @else
                                                <button class="btn btn-secondary" disabled><i class="fas fa-sign-in-alt"></i> Ditutup</button>
                                            @endif
                                        @endif
                                    </td>
                                    {{-- <td>
                                        @if($g->status)
                                            <!-- Tombol akan aktif jika status gelombang true -->
                                            <button class="btn btn-primary pilihGelombang" data-gelombang="{{ $g->id }}"><i class="fas fa-sign-in-alt"></i> Pilih</button>
                                        @else
                                            <!-- Menampilkan teks Ditutup jika status gelombang false -->
                                            <button class="btn btn-primary" disabled><i class="fas fa-sign-in-alt"></i> Ditutup</button>
                                        @endif
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var siswaId = "{{ auth()->user()->id }}"; // Mendefinisikan ID siswa yang sedang login

        $('.pilihGelombang').on('click', function() {
            var gelombangId = $(this).data('gelombang');
            var formData = new FormData();
            formData.append('siswa_id', siswaId);
            formData.append('gelombang_id', gelombangId);

            fetch('/pilih-gelombang', { // Sesuaikan dengan URL endpoint Anda
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                if(data.success) {
                    swal("Berhasil!", "Anda telah memilih gelombang.", "success");
                    // Men-disable tombol dan mengubah teksnya
                    $(this).prop('disabled', true).text('Sudah Memilih');
                } else {
                    swal("Error!", "Terjadi kesalahan saat memilih gelombang.", "error");
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>
@endsection
