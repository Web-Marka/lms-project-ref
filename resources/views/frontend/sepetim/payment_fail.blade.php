@extends('frontend.master')
@section('home')

<div class="rbt-error-area bg-gradient-11 rbt-section-gap">
    <div class="error-area">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-10">
                    <h3 class="sub-title">Ödeme İşlemi Sırasında Bir Hata Oluştu!</h3>
                    <p>Ödemeniz alınırken bir hata oluştu. Lütfen site yetkilileri ile iletişime geçiniz.</p>
                    <a class="rbt-btn btn-gradient icon-hover" href="{{ route('index') }}">
                        <span class="btn-text">Anasayfa</span>
                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
