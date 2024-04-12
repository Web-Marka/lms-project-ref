@extends('frontend.master')
@section('home')
    <div class="checkout_area bg-color-white rbt-section-gap">
        <div class="container">
            <form action="{{ route('credit.card.send') }}" method="post">
                <div class="row g-5 checkout-form">
                    <div class="col-lg-6">
                        <div class="checkout-content-wrapper">
                            <h4 class="checkout-title">Ödeme Bilgileri</h4>
                            <div class="row align-items-center">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label>Kart Üzerindeki İsim</label>
                                        <input required maxlength="50" type="text" name="cc_owner"
                                            placeholder="Kart sahibinin adı ve soyadı">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label>Kart Numarası</label>
                                        <input required maxlength="20" type="text" name="card_number"
                                            placeholder="**** **** **** ****">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label>Son Kullanma Tarihi (Ay)</label>
                                        <div class="rbt-modern-select bg-transparent height-45">
                                            <input required maxlength="2" type="text" name="expiry_month"
                                                placeholder="**">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Son Kullanma Tarihi (Yıl)</label>
                                        <div class="rbt-modern-select bg-transparent height-45">
                                            <input required maxlength="2" type="text" name="expiry_year"
                                                placeholder="**">
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label>Güvenlik Kodu</label>
                                        <input required maxlength="3" type="text" name="cvv"
                                            placeholder="CVC/CVV">
                                    </div>
                                </div>
                            </div>
                            <hr class="mt--20">
                            <img src="{{ asset('frontend/assets/images/odeme-logos.png') }}" style="max-height: 40px; margin-left: -30px;">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row pl_md--0 pl_sm--0">
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
                </div>
            </form>
        </div>
    </div>
@endsection
