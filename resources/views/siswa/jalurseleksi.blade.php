@extends('layouts.app')

@section('title', 'Pilih Jalur Seleksi')

@section('content')

<div class="page-header">
    <h4 class="page-title">Pilih Jalur Seleksi</h4>
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
                    <i class="fas fa-money-bill"></i> Jalur Seleksi
                </div>
            </div>
            
            <div class="card-body">
                <div class="card-sub">
                    <div class="alert-title">Info</div>
                    <ul>
                        <li>Silahkan pilih jalur seleksi yang ingin di ikuti.</li>
                    </ul>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama Jalur</th>
                                <th>Persyaratan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jalurSeleksi as $jalur)
                                <tr>
                                    <td>{{ $jalur->nama_jalur }}</td>
                                    <td>{!! $jalur->persyaratan !!}</td>
                                    <td>
                                        @if(!is_null($jalurDipilih) && $jalurDipilih->jalur_id == $jalur->id)
                                            <!-- Jika jalur ini adalah jalur yang dipilih -->
                                            <button class="btn btn-secondary" disabled><i class="fas fa-sign-in-alt"></i> Sudah Memilih</button>
                                        @elseif($jalur->status)
                                            <!-- Jika jalur ini tersedia untuk dipilih -->
                                            <button class="btn btn-primary pilihJalur" data-jalur="{{ $jalur->id }}"><i class="fas fa-sign-in-alt"></i> Pilih</button>
                                        @else
                                            <!-- Jika jalur ini tidak tersedia -->
                                            <button class="btn btn-secondary" disabled><i class="fas fa-sign-in-alt"></i> Ditutup</button>
                                        @endif
                                    </td>
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
        var siswaId = "{{ auth()->user()->id }}";
        $('.pilihJalur').on('click', function() {
            var jalurId = $(this).data('jalur');
            var sudahMemilih = "{{ !is_null($jalurDipilih) }}"; // Cek apakah sudah memilih
    
            // Fungsi untuk memilih jalur
            function pilihJalur() {
                var formData = new FormData();
                formData.append('siswa_id', siswaId);
                formData.append('jalur_id', jalurId);
    
                fetch('/pilih-jalur', { // Sesuaikan dengan URL endpoint Anda
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        swal("Berhasil!", "Anda telah memilih jalur.", "success");
                        // Reload halaman untuk memperbarui tampilan
                        location.reload();
                    } else {
                        swal("Error!", "Terjadi kesalahan saat memilih jalur.", "error");
                    }
                })
                .catch(error => console.error('Error:', error));
            }
    
            // Jika sudah memilih jalur sebelumnya
            if(sudahMemilih === "1") {
                swal({
                    title: "Apakah Anda Yakin?",
                    text: "Apakah anda yakin akan mengganti jalur seleksi?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willChange) => {
                    if (willChange) {
                        pilihJalur(); // Memanggil fungsi pilihJalur jika pengguna memilih "Ya"
                    } else {
                        swal("Penggantian jalur dibatalkan.");
                    }
                });
            } else {
                pilihJalur(); // Langsung pilih jalur jika belum memilih sebelumnya
            }
        });
    });
</script>
 
@endsection
