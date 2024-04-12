<!doctype html>
<html class="fixed">
	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="403, erişim, yetki" />
		<meta name="description" content="403 - Webmarka">
		<meta name="author" content="webmarka.com">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap/css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/animate/animate.compat.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/vendor/font-awesome/css/all.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/boxicons/css/boxicons.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/css/theme.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/css/skins/default.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">
	</head>
	<body>
		<section class="body-error error-outside">
			<div class="center-error">
				<div class="row">
					<div class="col-md-8">
						<div class="main-error mb-3">
							<h2 class="error-code text-dark text-center font-weight-semibold m-0">403 <i class="fas fa-file"></i></h2>
							<p class="error-explanation text-center">BU SAYFAYA ERİŞİM YETKİNİZ BULUNMAMAKTADIR!</p>
						</div>
					</div>
					<div class="col-md-4">
						<h4 class="text">Site Linkleri</h4>
						<ul class="nav nav-list flex-column primary">
							<li class="nav-item">
								<a class="nav-link" href="{{ route('index') }}"><i class="fas fa-caret-right text-dark"></i> Anasayfa</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}"><i class="fas fa-caret-right text-dark"></i> Kullanıcı Giriş</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#"><i class="fas fa-caret-right text-dark"></i> İletişim</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<script src="{{ asset('backend/vendor/jquery/jquery.js') }}"></script>
		<script src="{{ asset('backend/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
		<script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('backend/js/theme.js') }}"></script>
		<script src="{{ asset('backend/js/custom.js') }}"></script>
		<script src="{{ asset('backend/js/theme.init.js') }}"></script>
	</body>
</html>
