<div class="rbt-rbt-blog-area rbt-section-gap bg-color-extra2">
    <div class="container">
        <div class="row g-5 align-items-center mb--30">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="section-title">
                    <span class="subtitle bg-pink-opacity">Blog Yazıları</span>
                    <h2 class="title">En Son Yazılarımız</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="read-more-btn text-start text-md-end">
                    <a class="rbt-btn btn-gradient hover-icon-reverse" href="{{ route('blog') }}">
                        <div class="icon-reverse-wrapper">
                            <span class="btn-text">Tüm Yazıları Görüntüle</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @php
            $post = App\Models\Blog::latest()->first();
            $blog_p = App\Models\Blog::latest()->skip(1)->take(3)->get();
        @endphp
        <div class="row row--15">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt--30" data-sal-delay="150" data-sal="slide-up"
                data-sal-duration="800">
                <div class="rbt-card variation-02 height-330 rbt-hover">
                    <div class="rbt-card-img">
                        <a href="{{ url('blog/details/' . $post->blog_slug) }}">
                            <img src="{{ asset($post->blog_image) }}" alt="{{ $post->blog_title }}"> </a>
                    </div>
                    <div class="rbt-card-body">
                        <h3 class="rbt-card-title"><a
                                href="{{ url('blog/details/' . $post->blog_slug) }}">{{ $post->blog_title }}</a></h3>
                        <p class="rbt-card-text">{{ Illuminate\Support\Str::words($post->blog_meta, 20) }}</p>
                        <div class="rbt-card-bottom">
                            <a class="transparent-button" href="{{ url('blog/details/' . $post->blog_slug) }}">
                                Ayrıntılar<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg">
                                        <g stroke="#27374D" fill="none" fill-rule="evenodd">
                                            <path d="M10.614 0l5.629 5.629-5.63 5.629" />
                                            <path stroke-linecap="square" d="M.663 5.572h14.594" />
                                        </g>
                                    </svg></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt--30" data-sal-delay="150" data-sal="slide-up"
                data-sal-duration="800">
                @foreach ($blog_p as $post)
                    <div class="rbt-card card-list variation-02 rbt-hover mb--30">
                        <div class="rbt-card-img">
                            <a href="{{ url('blog/details/' . $post->blog_slug) }}">
                                <img src="{{ asset($post->blog_image) }}" alt="{{ $post->blog_title }}"> </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title"><a
                                    href="{{ url('blog/details/' . $post->blog_slug) }}">{{ $post->blog_title }}</a>
                            </h5>
                            <div class="rbt-card-bottom">
                                <a class="transparent-button"
                                    href="{{ url('blog/details/' . $post->blog_slug) }}">Ayrıntılar<i><svg
                                            width="17" height="12" xmlns="http://www.w3.org/2000/svg">
                                            <g stroke="#27374D" fill="none" fill-rule="evenodd">
                                                <path d="M10.614 0l5.629 5.629-5.63 5.629" />
                                                <path stroke-linecap="square" d="M.663 5.572h14.594" />
                                            </g>
                                        </svg></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
