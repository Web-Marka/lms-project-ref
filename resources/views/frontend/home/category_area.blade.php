@php
    $catTitle = App\Models\Title::find(1);
@endphp
<div class="rbt-categories-area bg-color-white rbt-section-gapBottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <span class="subtitle bg-primary-opacity">{{ $catTitle->category_badge }}</span>
                    <h2 class="title">{{ $catTitle->category_title }}</h2>
                </div>
            </div>
        </div>
        <div class="row g-5 mt--20">

            @php
                $category = App\Models\Category::latest()->get();
            @endphp

            @foreach ($category as $catlist)

            @php
                $course = App\Models\Course::where('category_id', $catlist->id)->get();
            @endphp

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="rbt-cat-box rbt-cat-box-1 variation-3 text-center">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{ url('category/'.$catlist->category_slug.'/'.$catlist->id) }}">
                                <img src="{{ asset($catlist->image) }}" alt="Category Images">
                                <div class="read-more-btn">
                                    <span class="rbt-btn btn-sm btn-white radius-round">{{ count($course) }} Kurs</span>
                                </div>
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="title"><a href="{{ url('category/'.$catlist->category_slug.'/'.$catlist->id) }}">{{ $catlist->category_name }}</a></h5>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach


        </div>
    </div>
</div>
