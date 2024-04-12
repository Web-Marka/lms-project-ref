@php
    $id = Auth::user()->id;
    $userId = App\Models\User::find($id);
@endphp
<div class="col-lg-3">
    <div class="rbt-default-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
        <div class="inner">
            <div class="content-item-content">

                <div class="rbt-default-sidebar-wrapper">
                    <div class="section-title mb--20">
                        <h6 class="rbt-title-style-2">Hoşgeldiniz, {{ $userId->name }}</h6>
                    </div>
                    <nav class="mainmenu-nav">
                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li><a href="{{ route('dashboard') }}"><i class="feather-home"></i><span>Kontrol Paneli</span></a></li>
                            <li><a href="{{ route('my.course') }}"><i class="feather-monitor"></i><span>Kurslarım</span></a></li>
                            <li><a href="{{ route('user.wishlist') }}"><i class="feather-heart"></i><span>İstek Listem</span></a></li>
                            <li><a href="{{ route('user.review') }}"><i class="feather-star"></i><span>Yorumlarım</span></a></li>
                            <li><a href="{{ route('user.all.order') }}"><i class="feather-shopping-bag"></i><span>Siparişlerim</span></a></li>
                            <li><a href="{{ route ('user.profile') }}"><i class="feather-settings"></i><span>Ayarlar</span></a></li>
                            <li><a href="{{ route ('user.logout') }}"><i class="feather-log-out"></i><span>Logout</span></a></li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>
