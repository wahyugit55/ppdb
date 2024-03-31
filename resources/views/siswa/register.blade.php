<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Register</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('img/icon.ico') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('css/fonts.min.css') }}']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atlantis.css') }}">

</head>
<body class="login">
	<div class="wrapper wrapper-login wrapper-login-full p-0">
		<div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
			<h1 class="title fw-bold text-white mb-3">PPDB SMK TELKOM LAMPUNG</h1>
			<p class="subtitle text-white op-7">Ayo bergabung sekarang di Sekolah Digital Terbaik !</p>
		</div>
		<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
			<div class="container container-login container-transparent animated fadeIn">
				<h3 class="text-center">Buat Akun</h3>
                <p class="text-center">Semua formulir wajib diisi dengan benar</p>
                <div class="login-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Field NISN -->
                        <div class="form-group">
                            <label for="nisn" class="placeholder"><b>NISN</b></label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fa fa-address-card"></i>
                                </span>
                                <input id="nisn" name="nisn" type="number" class="form-control" value="{{ old('nisn') }}" required maxlength="10">
                            </div>
                            @error('nisn')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Field Nama Lengkap -->
                        <div class="form-group">
                            <label for="nama_lengkap" class="placeholder"><b>Nama Lengkap</b></label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input id="nama_lengkap" name="nama_lengkap" type="text" class="form-control" value="{{ old('nama_lengkap') }}" required maxlength="255">
                            </div>
                            @error('nama_lengkap')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <!-- Field Jenis Sekolah -->
                        <div class="form-group">
                            <label for="jenis_sekolah" class="placeholder"><b>Jenis Sekolah</b></label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_sekolah" value="SMP" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button">SMP</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_sekolah" value="MTs" class="selectgroup-input">
                                    <span class="selectgroup-button">MTs</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_sekolah" value="Pondok" class="selectgroup-input">
                                    <span class="selectgroup-button">Pondok</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_sekolah" value="Paket" class="selectgroup-input">
                                    <span class="selectgroup-button">Paket</span>
                                </label>
                            </div>
                            @error('jenis_sekolah')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <!-- Field Asal Sekolah -->
                        <div class="form-group">
                            <label for="asal_sekolah" class="placeholder"><b>Asal Sekolah</b></label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fa fa-university"></i>
                                </span>
                                <input id="asal_sekolah" name="asal_sekolah" type="text" class="form-control" value="{{ old('asal_sekolah') }}" required maxlength="255">
                            </div>
                            @error('asal_sekolah')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <!-- Field Nomor HP -->
                        <div class="form-group">
                            <label for="nomor_hp" class="placeholder"><b>Nomor HP</b></label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fa fa-phone"></i>
                                </span>
                                <input id="nomor_hp" name="nomor_hp" type="number" class="form-control" value="{{ old('nomor_hp') }}" required maxlength="15">
                            </div>
                            @error('nomor_hp')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <!-- Field Password -->
                        <div class="form-group">
                            <label for="password" class="placeholder"><b>Password</b></label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fa fa-key"></i>
                                </span>
                                <input id="password" name="password" type="password" class="form-control" required minlength="6">
                                <div class="show-password">
                                    <i class="icon-eye"></i>
                                </div>
                            </div>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <!-- Field Confirm Password -->
                        <div class="form-group">
                            <label for="password_confirmation" class="placeholder"><b>Ulangi Password</b></label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fa fa-key"></i>
                                </span>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required minlength="6">
                                <div class="show-password">
                                    <i class="icon-eye"></i>
                                </div>
                            </div>
                        </div>
                
                        <!-- Submit Button -->
                        <div class="row form-action">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-secondary w-100 fw-bold"><i class="fa fa-sign-in-alt"></i> DAFTAR</button>
                            </div>                            
                        </div>
                        <div class="row form-action">
                            <div class="col-md-12">
                                <a href="/login" id="show-signin" class="btn btn-danger btn-link w-100 fw-bold">Sudah punya akun? Login Sekarang</a>
                            </div>
                        </div>
                    </form>
                </div>                
			</div>
		</div>
	</div>
	<script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/atlantis.min.js') }}"></script>
	<script src="{{ asset('js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    @if(session('registration_success'))
        <script>
            swal({
                title: "Pendaftaran Berhasil",
                text: "Anda akan diarahkan ke halaman login",
                icon: "success",
                buttons: {
                    confirm: {
                        className: 'btn btn-success'
                    }
                },
            }).then((willRedirect) => {
                if (willRedirect) {
                    window.location.href = "{{ route('login') }}";
                }
            });
        </script>
    @endif

</body>
</html>