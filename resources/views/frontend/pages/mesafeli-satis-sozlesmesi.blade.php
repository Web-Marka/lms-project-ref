@extends('frontend.master')
@section('home')
    <div class="rbt-overlay-page-wrapper">
        <div class="breadcrumb-image-container breadcrumb-style-max-width">
            <div class="breadcrumb-image-wrapper">
                <img src="{{ asset('frontend/assets/images/bg/bg-image-10.jpg') }}" alt="sozlesmeler">
            </div>
            <div class="breadcrumb-content-top text-center">
                <h1 class="title">Mesafeli Satış Sözleşmesi</h1>
            </div>
        </div>
        <div class="rbt-putchase-guide-area breadcrumb-style-max-width rbt-section-gapBottom">
            <div class="rbt-article-content-wrapper">
                <div class="content">
                    @php
                        $sozlesmeler = App\Models\Sozlesmeler::find(1);
                    @endphp
                    <p>
                        {!! $sozlesmeler->mesafeli_satis_sozlesmesi !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
