@extends('frontend.master')
@section('home')
<div class="rbt-conatct-area bg-gradient-11" style="padding-top: 100px; padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb--60">
                    <span class="subtitle bg-secondary-opacity">Sıkça Sorulan Sorular</span>
                    <h2 class="title">{{ $faq_main_title->faq_main_title }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rbt-accordion-area accordion-style-1 bg-color-white" style="padding-bottom: 100px;">
    <div class="container">
        <div class="row g-5">
            @foreach ($faq_content as $item)
                <div class="col-lg-6">
                    <div class="rbt-accordion-style accordion">
                        <div class="rbt-accordion-style rbt-accordion-04 accordion">
                            <div class="accordion" id="faq{{ $item->id }}">
                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="heading{{ $item->id }}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->id }}" aria-expanded="true" aria-controls="collapseThree1">
                                            {{ $item->faq_title }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $item->id }}" class="accordion-collapse collapse show" aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            {{ $item->faq_content }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection
