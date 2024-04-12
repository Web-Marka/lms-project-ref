@extends('frontend.master')
@section('home')

{{-- Start Banner Area --}}
@include('frontend.home.banner_area')
{{-- End Banner Area --}}

{{-- Start Category Area --}}
@include('frontend.home.category_area')
{{-- End Category Area --}}

<!-- Start Course Area -->
@include('frontend.home.course_area')
<!-- End Course Area -->

<!-- Start About Area  -->
@include('frontend.home.about_area')
<!-- End About Area  -->

<!-- Start Counterup Area  -->
@include('frontend.home.counterup_area')
<!-- End Counterup Area  -->

<!-- End Teacher Area  -->
@include('frontend.home.teacher_area')
<!-- End Teacher Area  -->

<!-- Start Blog Style -->
@include('frontend.home.blog_area')
<!-- End Blog Style -->

@endsection
