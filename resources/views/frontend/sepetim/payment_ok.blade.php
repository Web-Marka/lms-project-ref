@extends('frontend.master')
@section('home')

<div class="rbt-error-area bg-gradient-11 rbt-section-gap">
    <div class="error-area">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-10">
                    <h3 class="sub-title">Ödemeniz Başarılı Şekilde Alındı!</h3>
                    <p>Hesabınızda bulunan kurslarım bölümünden kurs içeriklerine erişebilirsiniz.</p>
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
