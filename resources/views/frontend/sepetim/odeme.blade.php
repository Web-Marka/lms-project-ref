@extends('frontend.master')
@section('home')
    <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">Ödeme</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}">Anasayfa</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">Ödeme</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="checkout_area bg-color-white rbt-section-gap">
        <div class="container">
            <form action="{{ route('payment') }}" method="POST">
                @csrf
                <div class="row g-5 checkout-form">
                    <div class="col-lg-6">
                        <div class="checkout-content-wrapper">
                            <div id="billing-form">
                                <h4 class="checkout-title">Fatura Bilgileri</h4>

                                <div class="row">

                                    <div class="col-md-12 col-12 mb--20">
                                        <label for="name">Adınız ve Soyadınız *</label>
                                        <input type="text" name="name" id="name">
                                    </div>

                                    <div class="col-md-6 col-12 mb--20">
                                        <label for="email">Email *</label>
                                        <input type="email" name="email" id="email">
                                    </div>

                                    <div class="col-md-6 col-12 mb--20">
                                        <label for="phone">Telefon *</label>
                                        <input type="tel" name="phone" id="phone" placeholder="0555 123 12 12" maxlength="15">
                                    </div>

                                    <div class="col-md-6 col-12 mb--20">
                                        <label for="city">İl *</label>
                                        <input type="text" name="city" id="city">
                                    </div>

                                    <div class="col-md-6 col-12 mb--20">
                                        <label for="town">İlçe *</label>
                                        <input type="text" name="town" id="town">
                                    </div>

                                    <div class="col-12 mb--20">
                                        <label for="address">Adres *</label>
                                        <input type="text" name="address" id="address">
                                    </div>

                                    <div class="single-method d-flex justify-content-end">
                                        <input type="checkbox" name="save_billing" id="save_billing">
                                        <label for="save_billing">
                                            Fatura Bilgilerini Kaydet
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row pl--50 pl_md--0 pl_sm--0">
                            <div class="col-12 mb--60">
                                <div class="checkout-cart-total">
                                    <h4>Sepet Toplamı </h4>
                                    <hr class="mt--30">

                                    <ul>
                                        @foreach ($carts as $item)
                                            <li>{{ $item->name }} <span> {{ $item->price }} TL</span></li>

                                            <input type="hidden" name="slug[]" value="{{ $item->options->slug }}">
                                            <input type="hidden" name="course_id[]" value="{{ $item->id }}">
                                            <input type="hidden" name="course_title[]" value="{{ $item->name }}">
                                            <input type="hidden" name="price[]" value="{{ $item->price }}">
                                            <input type="hidden" name="qty[]" value="{{ $item->qty }}">
                                            <input type="hidden" name="instructor_id[]" value="{{ $item->options->instructor }}">
                                        @endforeach

                                    </ul>

                                    @if (Session::has('kupon'))
                                        <p>Ara Toplam <span>{{ $cartTotal }} TL</span></p>
                                        <p>Kupon <span>{{ session()->get('kupon')['kupon_adi'] }}
                                            ( {{ session()->get('kupon')['kupon_indirim_tutari'] }} %)</span></p>
                                        <p>Kupon İndirimi<span>{{ session()->get('kupon')['discount_amount'] }} TL</span>
                                        </p>

                                        <h4 class="mt--30">Genel Toplam <span>{{ session()->get('kupon')['total_amount'] }}
                                                TL</span></h4>

                                        <input type="hidden" name="total" value="{{ $cartTotal}}">
                                    @else
                                        <h4 class="mt--30">Genel Toplam <span>{{ $cartTotal }} TL</span></h4>
                                        <input type="hidden" name="total" value="{{ $cartTotal }}">
                                    @endif

                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div class="col-12 mb--60">
                                <h4 class="checkout-title">Ödeme Seçimi</h4>
                                <div class="checkout-payment-method">

                                    <div class="single-method">
                                        <input type="radio" id="bankaHavalesi" name="cash_delivery" value="havale">
                                        <label for="bankaHavalesi">Havale/EFT</label>
                                    </div>

                                    <div class="single-method">
                                        <input type="radio" id="krediKarti" name="cash_delivery" value="card">
                                        <label for="krediKarti">Kredi/Banka Kartı <img
                                                src="{{ url('upload/secure-payment.png') }}"> </label>
                                    </div>

                                    <div class="single-method">
                                        <input type="checkbox" id="accept_terms">
                                        <label for="accept_terms">
                                            <a href=""> Mesafeli Satış Sözleşmesi</a>'ni Okudum ve Onaylıyorum.
                                        </label>
                                    </div>
                                </div>
                                <div class="plceholder-button mt--50">
                                    <button type="submit" class="rbt-btn btn-gradient icon-hover w-100 text-center">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">Siparişi Onayla</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
