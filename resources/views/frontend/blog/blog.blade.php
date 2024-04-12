@extends('frontend.master')
@section('home')
    <div class="rbt-page-banner-wrapper">
        <div class="rbt-banner-image"></div>
        <div class="rbt-banner-content">

            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <ul class="page-list">
                                <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}">Anasayfa</a></li>
                                <li>
                                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                </li>
                                <li class="rbt-breadcrumb-item active">Blog</li>
                            </ul>
                            <div class="title-wrapper">
                                <h1 class="title mb--0">Blog</h1>
                            </div>
                            <p class="description">##</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row row--30 gy-5">
                <div class="col-lg-8">
                    <div class="row g-5">

                        @foreach ($blog as $item)
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="rbt-blog-grid rbt-card variation-02 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="{{ url('blog/details/' . $item->blog_slug) }}">
                                            <img src="{{ asset($item->blog_image) }}" alt="{{ $item->blog_title }}"> </a>
                                    </div>
                                    <div class="rbt-card-body">
                                        <h5 class="rbt-card-title">
                                            <a href="{{ url('blog/details/' . $item->blog_slug) }}">
                                                {{ $item->blog_title }}
                                            </a>
                                        </h5>

                                        <ul class="blog-meta">
                                            <li><i class="feather-user"></i> admin</li>
                                            <li><i class="feather-clock"></i> {{ $item->created_at->format('d F Y') }}</li>
                                            <li><i class="feather-watch"></i> 1 min read</li>
                                        </ul>
                                        <p class="rbt-card-text">{{ $item->blog_meta }}</p>
                                        <div class="rbt-card-bottom">
                                            <a class="transparent-button" href="{{ url('blog/details/' . $item->blog_slug) }}">
                                                Görüntüle
                                                <i>
                                                    <svg width="17" height="12"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g stroke="#27374D" fill="none" fill-rule="evenodd">
                                                            <path d="M10.614 0l5.629 5.629-5.63 5.629" />
                                                            <path stroke-linecap="square" d="M.663 5.572h14.594" />
                                                        </g>
                                                    </svg>
                                                </i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="row">
                        <div class="col-lg-12 mt--60">
                            <nav>
                                {{ $blog->links('vendor.pagination.custom') }}
                            </nav>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4">
                    <aside class="rbt-sidebar-widget-wrapper rbt-gradient-border">

                        <!-- Start Widget Area  -->
                        <div class="rbt-single-widget rbt-widget-search">
                            <div class="inner">
                                <form action="#" class="rbt-search-style-1">
                                    <input type="text" placeholder="Ara...">
                                    <button class="search-btn"><i class="feather-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- End Widget Area  -->

                        <!-- Start Widget Area  -->
                        <div class="rbt-single-widget rbt-widget-recent">
                            <div class="inner">
                                <h4 class="rbt-widget-title">Kategoriler</h4>
                                <ul class="rbt-sidebar-list-wrapper recent-post-list">
                                    @foreach ($bcategory as $item)

                                    <li>
                                        <div class="content">
                                            <h2 class="title"><a href="{{ url('blog/category/'.$item->id) }}">
                                                {{ $item->category_name }}</a>
                                            </h2>
                                        </div>
                                    </li>

                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <!-- End Widget Area  -->

                        <!-- Popüler Yazılar  -->
                        <div class="rbt-single-widget rbt-widget-recent">
                            <div class="inner">
                                <h4 class="rbt-widget-title">Popüler Yazılar</h4>
                                <ul class="rbt-sidebar-list-wrapper recent-post-list">
                                    @foreach ($randomPost as $item)
                                    <li>
                                        <div class="thumbnail">
                                            <a href="{{ url('blog/details/' . $item->blog_slug) }}">
                                                <img src="{{ asset($item->blog_image) }}"
                                                alt="{{ $item->blog_title }}">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a href="{{ url('blog/details/' . $item->blog_slug) }}">
                                                {{ $item->blog_title }}</a></h6>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-clock"></i>{{ $item->created_at->format('M d Y') }}</li>
                                            </ul>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- End Popüler Yazılar  -->
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
