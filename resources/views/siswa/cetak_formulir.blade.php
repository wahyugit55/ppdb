@php
    \Carbon\Carbon::setLocale('id');
    $tanggalHariIni = \Carbon\Carbon::now()->isoFormat('D MMMM Y');
    $tanggalDanWaktuSekarang = \Carbon\Carbon::now()->isoFormat('D MMMM Y, HH:mm:ss');
@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>

    <title>Formulir_{{ $siswa->nama_lengkap }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <!-- Kop Surat -->
    <img src="{{ asset('img/' . $settings->file_kop_surat) }}" alt="Kop Surat" width="100%">
    <br><br>
    <center>
        <h6>Formulir Pendaftaran Calon Siswa Baru Tahun Pelajaran tahun ppdb</h6>
        <span>No. Pendaftaran : {{ $siswa->no_pendaftaran }} </span>
    </center>
    <br>
    <div class="table-responsiv">
        <h6>1. Biodata Siswa</h6>
        <table style="font-size: 12px" class="table table-striped table-bordered table-sm ">
            <tbody>
                <!-- <tr>
                    <th align="center" width="90" height="20">FOTO SISWA</th>
                    <td align="center" colspan="2"><b>DATA PRIBADI SISWA</b></td>
                </tr> -->
                <tr>
                    <td rowspan="5" width="10">
                        <!-- Pengkondisian jika ada foto -->
                        <img src="https://placehold.co/400x600?text=Photo\n4x6" width="120" />
                    </td>
                    <td width="150" height="5"><b>NISN</b></td>
                    <td height="10">{{ $siswa->nisn }}</td>
                </tr>

                <tr>
                    <td width="150" height="5"><b>Nama Lengkap</b></td>
                    <td align="left">{{ $siswa->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td width="150" height="5"><b>Tempat Tgl Lahir</b></td>
                    <td align="left">{{ $siswa->dataDiri->tempat_lahir }}, {{ $siswa->dataDiri->tgl_lahir }}</td>
                </tr>
                <tr>
                    <td width="150" height="5"><b>Jenis Kelamin</b></td>
                    <td align="left">{{ $siswa->dataDiri->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td width="150" height="5"><b>Asal Sekolah</b></td>
                    <td align="left">{{ $siswa->asal_sekolah }}</td>
                </tr>
            </tbody>
        </table>
        <table style="font-size: 12px" class="table table-striped table-bordered table-sm">
            <tbody>
                
                <tr>
                    <td style="width: 150px"><b>Pilihan Jurusan 1</b></td>
                    <td align="left">{{ $siswa->pilihJurusan->jurusanPilihan1->nama_jurusan ?? 'Tidak ada' }}</td>
                    <td style="width: 150px"><b>Pilihan Jurusan 2</b></td>
                    <td align="left">{{ $siswa->pilihJurusan->jurusanPilihan2->nama_jurusan ?? 'Tidak ada' }}</td>
                </tr>
                
                <tr>
                    <td style="width: 150px"><b>No NIK</b></td>
                    <td align="left">{{ $siswa->dataDiri->nik }}</td>
                    <td><b>No Handphone</b></td>
                    <td align="left"><i class="fab fa-whatsapp text-success"></i> {{ $siswa->nomor_hp }}</td>
                </tr>
                <tr>
                    <td><b>Ukuran Baju</b></td>
                    <td align="left">{{ $siswa->dataDiri->ukuran_baju }}</td>
                    <td><b>Agama</b></td>
                    <td align="left">{{ $siswa->dataDiri->agama }}</td>
                </tr>
                <tr>
                    <td><b>Alamat Siswa</b></td>
                    <td align="left">{{ $siswa->alamat->alamat }}</td>
                    <td><b>RT / RW</b></td>
                    <td align="left">{{ $siswa->alamat->rt }}, {{ $siswa->alamat->rw }}</td>
                </tr>
                <tr>
                    <td><b>Desa</b></td>
                    <td align="left">{{ $siswa->alamat->village->name }}</td>
                    <td><b>Kecamatan</b></td>
                    <td align="left">{{ $siswa->alamat->district->name }}</td>
                </tr>
                <tr>
                    <td><b>Kota / Kabupaten</b></td>
                    <td align="left">{{ $siswa->alamat->regency->name }}</td>
                    <td><b>Provinsi</b></td>
                    <td align="left">{{ $siswa->alamat->province->name }}</td>
                </tr>
            </tbody>
        </table>
        <h6>2. Data Orang Tua</h6>
        <table style="font-size: 12px" class="table table-bordered table-striped table-sm ">
            <tbody>
                <tr>
                    <td>#</td>
                    <!-- <td align="center" style="width: 150px"><i class="fas fa-user-friends"></i> <b>Data Orang Tua</b></td> -->
                    <td align="center"><i class="fas fa-user-friends"></i> <b>Data Ayah</b></td>
                    <td align="center"><i class="fas fa-user-friends"></i> <b>Data Ibu</b></td>
                </tr>
                
                <tr>
                    <td style="width: 150px"><b>Nama Lengkap</b></td>
                    <td align="left">{{ $siswa->orangTua->nama_ayah }}</td>
                    <td align="left">{{ $siswa->orangTua->nama_ibu }}</td>
                </tr>
                <tr>
                    <td style="width: 150px"><b>Pekerjaan</b></td>
                    <td align="left">{{ $siswa->orangTua->pekerjaan_ayah }}</td>
                    <td align="left">{{ $siswa->orangTua->pekerjaan_ibu }}</td>
                </tr>
                <tr>
                    <td style="width: 150px"><b>Penghasilan</b></td>
                    <td align="left">{{ $siswa->orangTua->penghasilan_ayah }}</td>
                    <td align="left">{{ $siswa->orangTua->penghasilan_ibu }}</td>
                </tr>
                <tr>
                    <td style="width: 150px"><b>No Hp</b></td>
                    <td align="left"><i class="fab fa-whatsapp text-success"></i> {{ $siswa->orangTua->no_hp_ayah }}</td>
                    <td align="left"><i class="fab fa-whatsapp text-success"></i> {{ $siswa->orangTua->no_hp_ibu }}</td>
                </tr>
            </tbody>
        </table>
        <h6>3. Akun CBT <i>( Digunakan Untuk Login Seleksi )</i></h6>
        <table style="font-size: 12px" class="table table-bordered table-striped table-sm ">
            <tbody>
                <tr>
                    <td style="width: 150px"><b>Username</b></td>
                    <td align="left">{{ $siswa->cbtAccount->username }}</td>
                </tr>
                <tr>
                    <td style="width: 150px"><b>Password</b></td>
                    <td align="left">{{ $siswa->cbtAccount->password_cbt }}</td>
                </tr>
                <tr>
                    <td style="width: 150px"><b>Link Seleksi</b></td>
                    <td align="left">{{ $siswa->cbtAccount->url }}</td>
                </tr>

            </tbody>
        </table>
        
        <div class="page-break"></div>

        <!-- Kop Surat -->
        <img src="{{ asset('img/' . $settings->file_kop_surat) }}" width="100%">
        <br><br>
        <center>
            <h6>Daftar Pembayaran PPDB Tahun Pelajaran tahun ppdb</h6>
        </center>
        <br>

        <table style="font-size: 12px" class="table table-sm">
            <thead>
                <tr>
                    <th class="text-center">
                        #
                    </th>
                    <th>Kode Transaksi</th>
                    <th>Nama Siswa</th>
                    <th>Jumlah Bayar</th>
                    <th>Tgl Bayar</th>
                    <th>Pembayaran</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($pembayarans as $pembayaran)
                    <tr>
                        <td>1</td> <!-- Contoh, Anda bisa menggunakan loop iteration atau lainnya untuk nomor -->
                        <td>{{ $pembayaran->kode_transaksi }}</td>
                        <td>{{ $pembayaran->siswa->nama_lengkap }}</td> <!-- Pastikan model Siswa memiliki kolom nama_siswa -->
                        <td>Rp. {{ number_format($pembayaran->biaya->jumlah_biaya, 0, ',', '.') }}</td>
                        <td>{{ $pembayaran->tgl_pembayaran->format('d-m-Y') }}</td> <!-- Format sesuai kebutuhan -->
                        <td>{{ $pembayaran->biaya->nama_biaya }}</td>
                        <td>
                            @if($pembayaran->status == 1)
                                Lunas
                            @else
                                Belum Lunas
                            @endif
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td style="text-align: right" colspan="3"><b>TOTAL</b></td>
                    <td><b>Rp. {{ number_format($totalPembayaran, 0, ',', '.') }}</b></td>
                </tr>
            </tbody>
        </table>
        <div class="alert alert-info">
            <h6>Terbilang: {{ ucwords($terbilang) }} Rupiah</h6>
        </div>
        <div class="row">
            <div>
                              
            </div>
            <div style="text-align: right">
                
            </div>
        </div>
        <table style="font-size: 12px" class="table" style="width: 100%;">
            <tbody>
                <tr>
                    <td>
                        <br>
                        Kepala Sekolah,
                        <br><br><br><br><br><br>
                        <u><b>{{ $settings->nama_kepsek }}</b></u>
                        <br>
                        <b>NIP. {{ $settings->nip_kepsek }}</b>
                    </td>
                    <td style="width: 120px;">&nbsp;</td>
                    <td>
                        {{ $settings->kota }}, {{ $tanggalHariIni }}
                        <br>
                        Yang Membuat Pernyataan
                        <br><br><br><br><br><br>
                        <b>{{ $siswa->nama_lengkap }}</b>

                    </td>
                </tr>

            </tbody>

        </table>
        <hr>
        <small>Dicetak Pada : {{ $tanggalDanWaktuSekarang }}</small><br>
        <span style="font-size:12px;"><b>Catatan : </b> <br>
            <ul>
                <li>Formulir di tandatangani dan dikumpulkan kepada panitia seleksi penerimaan siswa baru SMK Telkom Lampung, pendaftar dapat mengirimkan file PDF yang sudah ditandatangani melalui whatsapp dibawah ini atau langsung menyerahkan di sekolah berkas aslinya</li>
                <li>Jadwal seleksi didapatkan dari panitia, silahkan pantau di web PPDB pada menu jadwal seleksi</li>
                <li>Apabila ada pertanyaan lebih lanjut silahkan hubungi panitia ppdb melalui WhatsApp berikut : {{ $settings->no_cs }} A/N {{ $settings->nama_cs }}</li>
            </ul>
        </span>
    </div>
</body>

</html>