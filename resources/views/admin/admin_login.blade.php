<!doctype html>
<html class="fixed">
	<head>
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap/css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/animate/animate.compat.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/vendor/font-awesome/css/all.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/boxicons/css/boxicons.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/magnific-popup/magnific-popup.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/css/theme.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/css/skins/default.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">
		<script src="{{ asset('backend/vendor/modernizr/modernizr.js') }}"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo float-start">
					<img src="{{ asset('backend/img/webmarka.png') }}" height="70" />
				</a>

				<div class="panel card-sign">
					<div class="card-title-sign mt-3 text-end">
						<h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle me-1 text-6 position-relative top-5"></i>Admin Panel Giriş</h2>
					</div>
					<div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
							<div class="form-group mb-3">
								<label for="email">Kullanıcı Adı veya Email</label>
								<div class="input-group">
									<input name="email" id="email" type="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"/>
									<span class="input-group-text">
										<i class="bx bx-user text-4"></i>
									</span>
								</div>
                                @error('email')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
							</div>

							<div class="form-group mb-3">
								<div class="clearfix">
									<label for="password" class="float-start">Şifre</label>
								</div>
								<div class="input-group">
									<input name="password" id="password" type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror" />
									<span class="input-group-text">
										<i class="bx bx-lock text-4"></i>
									</span>
								</div>
                                @error('password')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
							</div>
							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Beni Hatırla</label>
									</div>
								</div>
								<div class="col-sm-4 text-end">
									<button type="submit" class="btn btn-primary mt-2" style="margin-bottom: 20px;">Giriş</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2024. All Rights Reserved.</p>
			</div>
		</section>
		<script src="{{ asset('backend/vendor/jquery/jquery.js') }}"></script>
		<script src="{{ asset('backend/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
		<script src="{{ asset('backend/vendor/popper/umd/popper.min.js') }}"></script>
		<script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('backend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
		<script src="{{ asset('backend/vendor/common/common.js') }}"></script>
		<script src="{{ asset('backend/vendor/nanoscroller/nanoscroller.js') }}"></script>
		<script src="{{ asset('backend/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
		<script src="{{ asset('backend/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
		<script src="{{ asset('backend/js/theme.js') }}"></script>
		<script src="{{ asset('backend/js/custom.js') }}"></script>
		<script src="{{ asset('backend/js/theme.init.js') }}"></script>
	</body>
</html>
