@extends('frontend.master')
@section('home')

    <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">Sepet</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}">Anasayfa</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">Sepet</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="rbt-cart-area bg-color-white rbt-section-gap">
        <div class="cart_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <!-- Cart Table -->
                            <div class="cart-table table-responsive mb--60">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Görsel</th>
                                            <th class="pro-title">Kurs</th>
                                            <th class="pro-price">Fiyat</th>
                                            <th class="pro-remove">İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cartPage">

                                    </tbody>
                                </table>
                            </div>
                        </form>

                        <div class="row g-5">
                            <div class="col-lg-6 col-12">
                                <div class="discount-coupon edu-bg-shade">
                                    <div class="section-title text-start">
                                        <h4 class="title mb--30">İndirim Kuponu</h4>
                                    </div>

                                    @if(Session::has('kupon'))
                                    @else

                                    <div class="col-md-6 col-12 mb--25" id="kuponDurumuWrapper" style="display: none;">
                                        <div id="kuponDurumu">
                                            <pre>Kupon Uygulandı</pre>
                                        </div>
                                    </div>

                                    <form action="#">
                                        <div class="row" id="kuponAlani">
                                            <div class="col-md-6 col-12 mb--25">
                                                <input type="text" id="kupon_adi" placeholder="Kupon Kodu">
                                            </div>
                                            <div class="col-md-6 col-12 mb--25">
                                                <a type="submit" id="kuponUygulaBtn" onclick="kuponUygula()" class="rbt-btn btn-gradient hover-icon-reverse btn-sm">
                                                    <span class="icon-reverse-wrapper">
                                                        <span class="btn-text">Uygula</span>
                                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </form>

                                    @endif

                                </div>
                            </div>

                            <div class="col-lg-5 offset-lg-1 col-12">
                                <div class="cart-summary">

                                    <div class="cart-summary-wrap" id="kuponHesaplamaAlani">

                                    </div>

                                    <div class="checkout-btn mt--20">
                                        <a class="rbt-btn btn-gradient icon-hover w-100 text-center"
                                            href="{{ route('odeme') }}">
                                            <span class="btn-text">Devam Et</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
