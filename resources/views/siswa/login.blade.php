<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
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
				<h3 class="text-center">Login</h3>
                <p class="text-center">Sign in to your Stella Account</p>
                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Field NISN -->
                        <div class="form-group">
                            <label for="no_pendaftaran" class="placeholder"><b>No. Pendaftaran</b></label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fa fa-address-card"></i>
                                </span>
                                <input id="no_pendaftaran" name="no_pendaftaran" type="text" class="form-control" value="{{ old('no_pendaftaran') }}" placeholder="Masukan no pendafaran" required maxlength="11">
                            </div>
                            @error('no_pendaftaran')
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
                                <input id="password" name="password" type="password" class="form-control" placeholder="Masukan password anda" required minlength="6">
                                <div class="show-password">
                                    <i class="icon-eye"></i>
                                </div>
                            </div>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <!-- Submit Button -->
                        <div class="row form-action">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-secondary w-100 fw-bold"><i class="fa fa-sign-in-alt"></i> LOGIN</button>
                            </div>                            
                        </div>
                        <div class="row form-action">
                            <div class="col-md-12">
                                <a href="/register" id="show-signin" class="btn btn-danger btn-link w-100 fw-bold">Belum punya akun? Daftar Sekarang</a>
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

    @if(session('registration_failed'))
        <script>
            swal({
                title: "Login Gagal",
                text: "Periksa kembali no pendaftaran dan password anda !",
                icon: "error",
                buttons: {
                    confirm: {
                        className: 'btn btn-danger'
                    }
                },
            });
        </script>
    @endif

</body>
</html>