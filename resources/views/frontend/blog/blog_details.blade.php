@extends('frontend.master')
@section('home')

    <div class="rbt-overlay-page-wrapper">
        <div class="breadcrumb-image-container breadcrumb-style-max-width">
            <div class="breadcrumb-image-wrapper">
                <img src="{{ asset('frontend/assets/images/bg/bg-image-10.jpg') }}" alt="Education Images">
            </div>
            <div class="breadcrumb-content-top text-center">
                <ul class="meta-list justify-content-center mb--10">
                    <li class="list-item">
                        <i class="feather-clock"></i>
                        <span>{{ $blog->created_at->format('M d Y') }}</span>
                    </li>
                </ul>
                <h1 class="title">{{ $blog->blog_title }}</h1>
                <p>{{ $blog->blog_meta }}</p>
            </div>
        </div>

        <div class="rbt-blog-details-area rbt-section-gapBottom breadcrumb-style-max-width">
            <div class="blog-content-wrapper rbt-article-content-wrapper">
                <div class="content">
                    <div class="post-thumbnail mb--30 position-relative wp-block-image alignwide">
                        <figure>
                            <img src="{{ asset($blog->blog_image) }}" alt="{{ $blog->blog_title }}">
                        </figure>
                    </div>

                    <p>{!! $blog->blog_content !!}</p>

                    <div class="tagcloud">
                        @foreach ($tags_all as $tag)
                        <a href="#">{{ ucwords($tag) }}</a>
                        @endforeach
                    </div>

                    <div class="social-share-block">
                        <div class="post-like">
                            <a href="#"><i class="feather feather-thumbs-up"></i><span>2.2k Like</span></a>
                        </div>
                        <ul class="social-icon social-default transparent-with-border">
                            <li><a href="https://www.facebook.com/">
                                    <i class="feather-facebook"></i>
                                </a>
                            </li>
                            <li><a href="https://www.twitter.com">
                                    <i class="feather-twitter"></i>
                                </a>
                            </li>
                            <li><a href="https://www.instagram.com/">
                                    <i class="feather-instagram"></i>
                                </a>
                            </li>
                            <li><a href="https://www.linkdin.com/">
                                    <i class="feather-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>



                    <div class="rbt-comment-area">

                        <div class="comment-respond">
                            <h4 class="title">Post a Comment</h4>
                            <form action="#">
                                <p class="comment-notes"><span id="email-notes">Your email address will not be
                                        published.</span> Required fields are marked <span class="required">*</span></p>
                                <div class="row row--10">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="name">Your Name</label>
                                            <input id="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="bl-email">Your Email</label>
                                            <input id="bl-email" type="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="website">Your Website</label>
                                            <input id="website" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="message">Leave a Reply</label>
                                            <textarea id="message" name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="comment-form-cookies-consent">
                                            <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
                                            <label for="wp-comment-cookies-consent">Save my name, email, and
                                                website in this browser for the next time I comment.</label>
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <a class="rbt-btn btn-gradient icon-hover radius-round btn-md" href="#">
                                            <span class="btn-text">Post Comment</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="rbt-comment-area">
                        <h5>Bu yazıya <span style="color:blue;">2</span> yorum yapıldı</h5>
                        <ul class="comment-list">
                            <!-- Start Single Comment  -->
                            <li class="comment">
                                <div class="comment-body">
                                    <div class="single-comment">
                                        <div class="comment-img">
                                            <img src="assets/images/testimonial/testimonial-1.jpg" alt="Author Images">
                                        </div>
                                        <div class="comment-inner">
                                            <h6 class="commenter">
                                                <a href="#">Cameron Williamson</a>
                                            </h6>
                                            <div class="comment-meta">
                                                <div class="time-spent">Nov 23, 2018 at 12:23 pm</div>
                                            </div>
                                            <div class="comment-text">
                                                <p class="b2">Duis hendrerit velit scelerisque felis tempus, id porta
                                                    libero venenatis. Nulla facilisi. Phasellus viverra
                                                    magna commodo dui lacinia tempus. Donec malesuada nunc
                                                    non dui posuere, fringilla vestibulum urna mollis.
                                                    Integer condimentum ac sapien quis maximus. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- End Single Comment  -->
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

   @endsection
