@php
    $iletisim = App\Models\SiteSetting::find(1);
@endphp
<footer class="rbt-footer footer-style-1 bg-color-white overflow-hidden">
    <div class="footer-top">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget">
                        <div class="logo">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('frontend/assets/images/logo/logo.png') }}" alt="lms logo">
                            </a>
                        </div>

                        <p class="description mt--20">
                            {{ $iletisim->footer_description }}
                        </p>

                        <ul class="social-icon social-default justify-content-start">
                            <li><a href="{{ $iletisim->facebook }}">
                                    <i class="feather-facebook"></i>
                                </a>
                            </li>
                            <li><a href="{{ $iletisim->twitter }}">
                                    <i class="feather-twitter"></i>
                                </a>
                            </li>
                            <li><a href={{ $iletisim->instagram }}">
                                    <i class="feather-instagram"></i>
                                </a>
                            </li>
                        </ul>

                        <div class="contact-btn mt--30">
                            <a class="rbt-btn hover-icon-reverse btn-border-gradient radius-round" href="{{ route ('become.instructor') }}">
                                <div class="icon-reverse-wrapper">
                                    <span class="btn-text">Eğitmen Olun</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h5 class="ft-title">Kategoriler</h5>
                        <ul class="ft-link">

                            @php
                                $footerkategoriler = App\Models\Category::latest()->limit(5)->get();
                            @endphp

                            @foreach ($footerkategoriler as $kategori)

                            @php
                                $course = App\Models\Course::where('category_id', $kategori->id)->get();
                            @endphp

                            <li>
                                <a href="{{ url('category/'.$kategori->category_slug.'/'.$kategori->id) }}">{{ $kategori->category_name }}</a>
                            </li>

                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h5 class="ft-title">Sayfalar</h5>
                        <ul class="ft-link">
                            <li>
                                <a href="{{ route('hakkimizda') }}">Hakkımızda</a>
                            </li>
                            <li>
                                <a href="{{ route('instructor.courses') }}">Kurslar</a>
                            </li>
                            <li>
                                <a href="{{ route('blog') }}">Blog</a>
                            </li>
                            <li>
                                <a href="instructor.html">S.S.S.</a>
                            </li>
                            <li>
                                <a href="{{ route('iletisim') }}">İletişim</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h5 class="ft-title">İletişim</h5>
                        <ul class="ft-link">
                            <li><span>Telefon:</span> <a href="tel:{{ $iletisim->telefon }}">{{ $iletisim->telefon }}</a></li>
                            <li><span>E-mail:</span> <a href="mailto:{{ $iletisim->email }}">{{ $iletisim->email }}</a></li>
                            <li><span>Adres:</span> <a>{{ $iletisim->adres }}</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-style-1 ptb--20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                    <p class="rbt-link-hover text-center text-lg-start">Copyright © 2024 <a href="https://webmarka.com">WebMarka.</a> All Rights Reserved</p>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                    <ul class="copyright-link rbt-link-hover justify-content-center justify-content-lg-end mt_sm--10 mt_md--10">
                        <li><a href="{{ route('gizlilik.politikasi') }}">Gizlilik Politikası</a></li>
                        <li><a href="{{ route('mesafeli.satis.sozlesmesi') }}">Mesafeli Satış Sözleşmesi</a></li>
                        <li><a href="{{ route('cerez.politikasi') }}">Çerez Politikası</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
