@include('frontend.mycourse.include.header')

<div class="rbt-lesson-area bg-color-white">
    <div class="rbt-lesson-content-wrapper">
        <div class="rbt-lesson-leftsidebar">
            <div class="rbt-course-feature-inner rbt-search-activation">
                <div class="section-title">
                    <h4 class="rbt-title-style-3">Kurs İçeriği</h4>
                </div>

                <div class="rbt-accordion-style rbt-accordion-02 for-right-content accordion">
                    <div class="accordion" id="accordionExampleb2">

                        @foreach ($section as $sec)
                            @php
                                $lectures = App\Models\CourseLecture::where('section_id', $sec->id)->get();
                            @endphp

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="heading{{ $sec->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        aria-expanded="true" data-bs-target="#collapse{{ $sec->id }}"
                                        aria-controls="collapse{{ $sec->id }}">
                                        {{ $sec->section_title }} <span
                                            class="rbt-badge-5 ml--10">({{ count($lectures) }})</span>
                                    </button>
                                </h2>
                                <div id="collapse{{ $sec->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $sec->id }}">
                                    <div class="accordion-body card-body">
                                        <ul class="rbt-course-main-content liststyle">

                                            @foreach ($lectures as $lecture)
                                                <li>
                                                    <a href="#" class="lecture-link"
                                                        data-video-url="{{ $lecture->url }}"
                                                        data-content="{!! $lecture->content !!}">
                                                        <div class="course-content-left">
                                                            <i class="feather-play-circle"></i>
                                                            <span class="text lecture-title">
                                                                {{ $lecture->lecture_title }}
                                                            </span>
                                                        </div>
                                                        <div class="course-content-right">
                                                            <span class="rbt-check"><i class="feather-check"></i></span>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="rbt-lesson-rightsidebar overflow-hidden lesson-video">
            <div class="lesson-top-bar">
                <div class="lesson-top-left">
                    <div class="rbt-lesson-toggle">
                        <button class="lesson-toggle-active btn-round-white-opacity" title="Toggle Sidebar"><i
                                class="feather-arrow-left"></i></button>
                    </div>
                    <h5>{{ $course->course->course_name }}</h5>
                </div>
                <div class="lesson-top-right">
                    <div class="rbt-btn-close">
                        <a href="{{ route('my.course') }}" title="Go Back to Course" class="rbt-round-btn"><i
                                class="feather-x"></i></a>
                    </div>
                </div>
            </div>
            <div class="inner">
                <div class="plyr__video-embed videoContainer">
                    <iframe src="" id="videoContainer" allowfullscreen allow="autoplay"></iframe>
                    <div class="section-title mt--30" id="textLesson">
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
        // Plyr.js ile uyumlu bir şekilde iframe içinde video oynatıcıyı başlat
        const player = new Plyr('#videoContainer', {
            controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],
        });

        // Ders bağlantıları için olay dinleyicileri ekleyin
        document.querySelectorAll('.lecture-link').forEach(lectureLink => {
            lectureLink.addEventListener('click', function(event) {
                event.preventDefault(); // Sayfa yenilenmesini önle

                // Video URL'yi ve metin içeriğini al
                const videoUrl = this.getAttribute('data-video-url');
                const textContent = this.getAttribute('data-content');

                const videoContainer = document.getElementById("videoContainer");
                const textContainer = document.getElementById("textLesson").querySelector('p');

                // Eğer video URL'si varsa, iframe kaynağını güncelle
                if (videoUrl && videoUrl.trim() !== "") {
                    videoContainer.src = videoUrl; // iframe src'sini güncelle
                    videoContainer.classList.remove('d-none'); // iframe'i göster
                    textContainer.parentElement.classList.add('d-none'); // Metin bölümünü gizle
                } else if (textContent && textContent.trim() !== "") {
                    // Metin içeriği varsa, videoyu gizle ve metni göster
                    videoContainer.classList.add('d-none'); // iframe'i gizle
                    textContainer.innerHTML = textContent; // Metin içeriğini ekle
                    textContainer.parentElement.classList.remove('d-none'); // Metin bölümünü göster
                }
            });
        });

        // İlk dersi otomatik olarak aç
        const firstLecture = document.querySelector('.lecture-link');
        if (firstLecture) {
            firstLecture.click();
        }
    });
</script>


@include('frontend.mycourse.include.footer')
