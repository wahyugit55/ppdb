<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pembayaran</title>
    <!-- Sertakan CSS eksternal jika diperlukan atau style inline di sini -->
</head>
<body>
    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-9">
                        <div class="card card-invoice">
                            <div class="card-header">
                                <div class="invoice-header">
                                    <h3 class="invoice-title">Invoice</h3>
                                    <div class="invoice-logo">
                                        <!-- Logo atau gambar perusahaan Anda -->
                                    </div>
                                </div>
                                <div class="invoice-desc">
                                    Bandung, West Java, Indonesia<br/>
                                    Fax 621113
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 info-invoice">
                                        <h5 class="sub">Date</h5>
                                        <p>{{ $pembayaran->tgl_pembayaran->format('d M, Y') }}</p>
                                    </div>
                                    <div class="col-md-4 info-invoice">
                                        <h5 class="sub">Invoice ID</h5>
                                        <p>{{ $pembayaran->kode_transaksi }}</p>
                                    </div>
                                    <div class="col-md-4 info-invoice">
                                        <h5 class="sub">Invoice To</h5>
                                        <p>
                                            {{ $pembayaran->siswa->nama }}<br/>
                                            <!-- Alamat siswa jika ada -->
                                        </p>
                                    </div>
                                </div>
                                <!-- Detail pembayaran lainnya -->
                            </div>
                            <div class="card-footer">
                                <!-- Informasi tambahan -->
                                {!! $barcode !!} <!-- Menampilkan barcode -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>