@php
    $id = Auth::user()->id;
    $instructorId = App\Models\User::find($id);
    $status = $instructorId->status;
@endphp

<div class="col-lg-3">
    <div class="rbt-default-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
        <div class="inner">
            <div class="content-item-content">

                <div class="rbt-default-sidebar-wrapper">
                    <div class="section-title mb--20">
                        <h6 class="rbt-title-style-2">Hoşgeldiniz, {{ $instructorId->name }}</h6>
                    </div>
                    @if ($status === '1')

                    <nav class="mainmenu-nav">
                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li><a href="{{ route('instructor.dashboard') }}"><i class="feather-home"></i><span>Kontrol Paneli</span></a></li>
                            <li><a href="{{ route ('all.course') }}"><i class="feather-book-open"></i><span>Eğitimlerim</span></a></li>
                            <li><a href="{{ route ('instructor.all.order') }}"><i class="feather-shopping-bag"></i><span>Satışlar</span></a></li>
                            <li><a href="{{ route('instructor.all.review') }}"><i class="feather-star"></i><span>Eğitim Yorumları</span></a></li>
                        </ul>
                    </nav>

                    <div class="section-title mt--40 mb--20">
                        <h6 class="rbt-title-style-2">Hesap Ayarları</h6>
                    </div>

                    @else

                    @endif

                    <nav class="mainmenu-nav">
                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li><a href="{{ route ('instructor.profile') }}"><i class="feather-settings"></i><span>Ayarlar</span></a></li>
                            <li><a href="{{ route ('instructor.logout') }}"><i class="feather-log-out"></i><span>Çıkış</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
