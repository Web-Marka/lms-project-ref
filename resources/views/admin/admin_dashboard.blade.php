<!doctype html>
<html class="fixed">
	<head>
		<meta charset="UTF-8">

		<title>LMS Admin - WebMarka LMS Admin Tema</title>

		<meta name="keywords" content="WebMarka LMS Admin Tema" />
		<meta name="description" content="LMS Admin - WebMarka LMS Admin Tema">
		<meta name="author" content="webmarka.com">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap/css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/animate/animate.compat.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/vendor/font-awesome/css/all.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/boxicons/css/boxicons.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/magnific-popup/magnific-popup.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/jquery-ui/jquery-ui.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/jquery-ui/jquery-ui.theme.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/morris/morris.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/css/theme.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/css/skins/default.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/css/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/css/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/vendor/select2/css/select2.css') }}" />
        <link rel="stylesheet" href="{{ asset('backend/vendor/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/vendor/datatables/media/css/dataTables.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />
        <link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('backend/vendor/summernote/summernote-bs4.min.css') }}">
		<script src="{{ asset('backend/vendor/modernizr/modernizr.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	</head>
	<body>
		<section class="body">
			@include('admin.include.admin_header')
			<div class="inner-wrapper">
				@include('admin.include.admin_sidebar')

				@yield('admincontent')
			</div>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script>
                @if(Session::has('message'))
                var type = "{{ Session::get('alert-type','info') }}"
                switch(type){
                    case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                    case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                    case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                    case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
                }
                @endif
            </script>
            <script>
                $(function(){
                    $(document).on('click','#delete',function(e){
                        e.preventDefault();
                        var link = $(this).attr("href");

                        Swal.fire({
                        title: 'Emin Misiniz?',
                        text: "Veri Siliniyor!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Evet',
                        cancelButtonText: 'İptal'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = link
                        }
                        })
                    });
                });
            </script>
		</section>
		{{-- <script src="{{ asset('backend/vendor/jquery/jquery.js') }}"></script> --}}
		<script src="{{ asset('backend/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
		<script src="{{ asset('backend/vendor/popper/umd/popper.min.js') }}"></script>
		<script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('backend/vendor/common/common.js') }}"></script>
		<script src="{{ asset('backend/vendor/nanoscroller/nanoscroller.js') }}"></script>
		<script src="{{ asset('backend/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
		<script src="{{ asset('backend/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
		<script src="{{ asset('backend/vendor/jquery-ui/jquery-ui.js') }}"></script>
        <script src="{{ asset('backend/js/validate.min.js') }}"></script>
		<script src="{{ asset('backend/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js') }}"></script>
		<script src="{{ asset('backend/vendor/jquery-appear/jquery.appear.js') }}"></script>
		<script src="{{ asset('backend/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
		<script src="{{ asset('backend/vendor/jquery.easy-pie-chart/jquery.easypiechart.js') }}"></script>
		<script src="{{ asset('backend/vendor/flot/jquery.flot.js') }}"></script>
		<script src="{{ asset('backend/vendor/flot.tooltip/jquery.flot.tooltip.js') }}"></script>
		<script src="{{ asset('backend/vendor/flot/jquery.flot.pie.js') }}"></script>
		<script src="{{ asset('backend/vendor/flot/jquery.flot.categories.js') }}"></script>
		<script src="{{ asset('backend/vendor/flot/jquery.flot.resize.js') }}"></script>
		<script src="{{ asset('backend/vendor/jquery-sparkline/jquery.sparkline.js') }}"></script>
		<script src="{{ asset('backend/vendor/raphael/raphael.js') }}"></script>
		<script src="{{ asset('backend/vendor/morris/morris.js') }}"></script>
		<script src="{{ asset('backend/vendor/gauge/gauge.js') }}"></script>
		<script src="{{ asset('backend/vendor/snap.svg/snap.svg.js') }}"></script>
		<script src="{{ asset('backend/vendor/liquid-meter/liquid.meter.js') }}"></script>
        <script src="{{ asset('backend/vendor/autosize/autosize.js') }}"></script>
		<script src="{{ asset('backend/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/select2/js/select2.js') }}"></script>
		<script src="{{ asset('backend/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('backend/vendor/datatables/media/js/dataTables.bootstrap5.min.js') }}"></script>
		<script src="{{ asset('backend/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ asset('backend/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('backend/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('backend/js/examples/examples.datatables.default.js') }}"></script>
		<script src="{{ asset('backend/js/examples/examples.datatables.tabletools.js') }}"></script>
        <script src="{{ asset('backend/vendor/ios7-switch/ios7-switch.js') }}"></script>
        <script src="{{ asset('backend/vendor/jquery-maskedinput/jquery.maskedinput.js') }}"></script>
        <script src="{{ asset('backend/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
        <script src="{{ asset('backend/vendor/bootstrap-markdown/js/markdown.js')}}"></script>
		<script src="{{ asset('backend/vendor/bootstrap-markdown/js/to-markdown.js')}}"></script>
		<script src="{{ asset('backend/vendor/bootstrap-markdown/js/bootstrap-markdown.js')}}"></script>
        <script src="{{ asset('backend/js/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('backend/js/theme.js') }}"></script>
		<script src="{{ asset('backend/js/theme.init.js') }}"></script>
		<script src="{{ asset('backend/js/examples/examples.dashboard.js') }}"></script>
        <script src="{{ asset('backend/js/examples/examples.advanced.form.js') }}"></script>
        <script src="{{ asset('backend/vendor/summernote/summernote-bs4.min.js') }}"></script>
	</body>
</html>
