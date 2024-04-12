<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Admin Menü
        </div>
        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li>
                        <a class="nav-active" href="{{ route('admin.dashboard') }}">
                            <i class="bx bx-home-alt" aria-hidden="true"></i>
                            <span>Kontrol Paneli</span>
                        </a>
                    </li>
                    @if (Auth::user()->can('siparisler.menu'))
                    <li class="nav-parent nav-active">
                        <a class="nav-link" href="#">
                            <i class="bx bx-cart" aria-hidden="true"></i>
                            <span>Sipariş Yönetimi</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{ route ('admin.bekleyen.siparisler') }}">
                                    Bekleyen Siparişler
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route ('admin.tamamlanan.siparisler') }}">
                                    Tamamlanan Siparişler
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->can('egitmen.menu'))
                    <li class="nav-parent nav-active">
                        <a class="nav-link" href="#">
                            <i class="bx bx-user-pin" aria-hidden="true"></i>
                            <span>Eğitmen Yönetimi</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{ route ('all.instructor') }}">
                                    Eğitmenler
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->can('kullanici.menu'))
                    <li class="nav-parent nav-active">
                        <a class="nav-link" href="#">
                            <i class="bx bxs-user-circle" aria-hidden="true"></i>
                            <span>Kullanıcı Yönetimi</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{ route ('all.user') }}">
                                    Kullanıcılar
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route ('active.all.instructor') }}">
                                    Eğitmenler
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->can('kurs.menu'))
                    <li class="nav-parent nav-active">
                        <a class="nav-link" href="#">
                            <i class="bx bxl-redux" aria-hidden="true"></i>
                            <span>Kurs Yönetimi</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{ route ('admin.all.course') }}">
                                    Kurslar
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->can('kurs.yorumlari.menu'))
                    <li class="nav-parent nav-active">
                        <a class="nav-link" href="#">
                            <i class="bx bx-comment-detail" aria-hidden="true"></i>
                            <span>Kurs Yorumları</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{ route('pending.review') }}">
                                    Onay Bekleyen Yorumlar
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('active.review') }}">
                                    Onaylı Yorumlar
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->can('category.menu'))
                    <li class="nav-parent nav-active">
                        <a class="nav-link" href="#">
                            <i class="bx bx-category" aria-hidden="true"></i>
                            <span>Kategori Yönetimi</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{ route ('all.category') }}">
                                    Kategoriler
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route ('all.subcategory') }}">
                                    Alt Kategoriler
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->can('kuponlar.menu'))
                    <li class="nav-parent nav-active">
                        <a class="nav-link" href="#">
                            <i class="bx bxs-discount" aria-hidden="true"></i>
                            <span>Kupon Yönetimi</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{ route ('admin.kuponlar') }}">
                                    Kuponlar
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->can('blog.menu'))
                    <li class="nav-parent nav-active">
                        <a class="nav-link" href="#">
                            <i class="bx bxl-blogger" aria-hidden="true"></i>
                            <span>Blog Yönetimi</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{ route('admin.blog.posts') }}">
                                    Blog Yazıları
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('admin.blog.category') }}">
                                    Kategoriler
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->can('site.setting.menu'))
                    <li class="nav-parent nav-active">
                        <a class="nav-link" href="#">
                            <i class="bx bxs-cog" aria-hidden="true"></i>
                            <span>Site Yönetimi</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{ route ('admin.site.setting') }}">
                                    Site Ayarları
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route ('smtp.setting') }}">
                                    SMTP Mail Ayarları
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route ('admin.sozlesmeler') }}">
                                    Sözleşmeler
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route ('admin.faq') }}">
                                    Sıkça Sorulan Sorular
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route ('admin.hakkimizda') }}">
                                    Hakkımızda
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route ('admin.basliklar') }}">
                                    Anasayfa İçerikleri
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->can('raporlar.menu'))
                    <li class="nav-parent nav-active">
                        <a class="nav-link" href="#">
                            <i class="bx bxs-report" aria-hidden="true"></i>
                            <span>Rapor Yönetimi</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{ route ('raporlar') }}">
                                    Raporlar
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->can('roller.menu'))
                    <li class="nav-parent nav-active">
                        <a class="nav-link" href="#">
                            <i class="bx bx-target-lock" aria-hidden="true"></i>
                            <span>Roller & İzinler</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{ route ('all.permission') }}">
                                    İzinler
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route ('all.roles') }}">
                                    Roller
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route ('all.roles.permission') }}">
                                    Rol İzinleri
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->can('yonetici.menu'))
                    <li class="nav-parent nav-active">
                        <a class="nav-link" href="#">
                            <i class="bx bxs-user-account" aria-hidden="true"></i>
                            <span>Yönetici Yönetimi</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{ route ('yoneticiler') }}">
                                    Yöneticiler
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li>
                        <a class="nav-link" href="{{ route ('admin.logout') }}">
                            <i class="bx bx-exit" aria-hidden="true"></i>
                            <span>Çıkış</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</aside>
