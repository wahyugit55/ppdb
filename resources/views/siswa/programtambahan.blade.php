@extends('layouts.app')

@section('title', 'Pilih Program Tambahan')

@section('content')

<div class="page-header">
    <h4 class="page-title"><span class="text-danger">(Opsional)</span> Pilih Program Tambahan</h4>
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
                    <i class="fas fa-money-bill"></i> Program Tambahan
                </div>
            </div>
            
            <div class="card-body">
                <div class="card-sub">
                    <div class="alert-title">Info</div>
                    <ul>
                        <li>Tersedia program tambahan <b>Asrama Dan Tahfidz, anda dapat memilih program tersebut.</b></li>
                        <li><b>Program tambahan tidak wajib.</b> Silahkan <b>lewati</b> apabila tidak ingin memilih program tambahan.</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if($programTambahanWajib)
                            <div class="form-group">
                                <label>Program Tambahan Wajib</label>
                                <input type="text" class="form-control" value="{{ $programTambahanWajib->nama_program }}" readonly>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Pilihan Program Tambahan (Opsional)</label>
                            <div class="select2-input">
                                <select id="program_tambahan" name="program_tambahan" class="form-control" required>
                                    <option value="0">--Pilih Salah Satu Program Tambahan--</option>
                                    @foreach($programTambahan as $pt)
                                        <option value="{{ $pt->id }}" {{ $pilihanProgramTambahan == $pt->id ? 'selected' : '' }}>{{ $pt->nama_program }}</option>
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
        var programSudahDipilih = {{ $pilihanProgramTambahan ? 'true' : 'false' }}; // Cek apakah siswa sudah memilih jurusan
        $('#program_tambahan').on('change', function() {
            let programTambahanId = $(this).val();
            let pesan = programSudahDipilih ? "Apakah Anda yakin akan merubah pilihan ?" : "Apakah Anda yakin untuk memilih program tambahan ini?";
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
                        url: "{{ route('siswa.programtambahan.store') }}",
                        type: "POST",
                        data: {
                            program_tambahan_id: programTambahanId,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if(response.success) {
                                swal("Berhasil!", "Program tambahan berhasil dipilih.", "success")
                                .then((value) => {
                                    window.location.reload(); // Reload halaman setelah sukses
                                });
                            } else {
                                swal("Error!", "Gagal memilih program tambahan.", "error");
                            }
                        },
                        error: function(xhr, status, error) {
                            var err = JSON.parse(xhr.responseText);
                            swal("Error!", err.message, "error");
                        }
                    });
                }
            });
        });
    });

</script>

@endsection
