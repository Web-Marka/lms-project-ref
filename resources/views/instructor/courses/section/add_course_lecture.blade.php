@extends('instructor.instructor_dashboard')
@section('instructorcontent')
    <div class="col-lg-9">
        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
            <div class="content">
                <div class="section-title">
                    <h4 class="rbt-title-style-3">Kurs Video İçeriği Ekle</h4>
                </div>

                <div class="rbt-callto-action rbt-cta-default style-2">
                    <div class="content-wrapper overflow-hidden pt--30 pb--30 bg-color-primary-opacity">
                        <div class="row gy-5 align-items-end">
                            <div class="col-lg-8">
                                <div class="inner">
                                    <div class="content text-left">
                                        <h5 class="mb--5">{{ $course->course_name }}</h5>
                                        <p class="b3">Kurs Bölüm Başlığı Oluştur</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="call-to-btn text-start text-lg-end position-relative">
                                    <button class="rbt-btn btn-sm btn-gradient hover-icon-reverse" type="button"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal" data-backdrop="false">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">Kurs Bölüm Başlığı Ekle</span>
                                            <span class="btn-icon"><i class="feather-plus-circle"></i></span>
                                            <span class="btn-icon"><i class="feather-plus-circle"></i></span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($section as $key => $item)
                    <div class="rbt-callto-action rbt-cta-default style-2 mt--20">
                        <div class="content-wrapper overflow-hidden pt--10 pb--10 bg-color-grey">
                            <div class="row gy-5">
                                <div class="col-lg-8">
                                    <div class="inner">
                                        <div class="content text-left">
                                            <h5 class="mb--5">{{ $item->section_title }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="call-to-btn text-start text-lg-end position-relative d-flex justify-content-between">
                                        <button class="rbt-btn btn-xs btn-gradient hover-icon-reverse"
                                            onclick="addLectureDiv({{ $course->id }}, {{ $item->id }}, 'lectureContainer{{ $key }}')"
                                            id="addLectureBtn{{ $key }}">
                                            <span class="icon-reverse-wrapper">
                                                <span class="btn-text">Video Başlığı Ekle</span>
                                                <span class="btn-icon"><i class="feather-plus-circle"></i></span>
                                                <span class="btn-icon"><i class="feather-plus-circle"></i></span>
                                            </span>
                                        </button>
                                        <form action="{{ route('delete.section',['id' => $item->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="rbt-btn btn-xs btn-gradient hover-icon-reverse">
                                                <span class="icon-reverse-wrapper">
                                                    <span class="btn-text">Sil</span>
                                                    <span class="btn-icon"><i class="feather-trash"></i></span>
                                                    <span class="btn-icon"><i class="feather-trash"></i></span>
                                                </span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- Kurs İçerik Video Başlığı --}}



                            <div id="lectureContainer{{ $key }}"
                                class="justify-content-between align-items-end mt--20">
                                <div class="container">

                                    @foreach ($item->lectures as $lecture)

                                    <div class="lectureDiv">
                                        <div class="content-wrapper overflow-hidden pt--10 pb--10 mb--10 bg-color-primary-opacity d-flex justify-content-between align-items-center">
                                            <strong>{{ $loop->iteration }}. {{ $lecture->lecture_title }}</strong>
                                            <div class="rbt-button-group">
                                                <a class="rbt-btn-link left-icon" href="{{ route('edit.lecture',['id' => $lecture]) }}"><i class="feather-edit"></i>
                                                    Düzenle</a>
                                                <a class="rbt-btn-link left-icon" href="{{ route('delete.lecture',['id' => $lecture]) }}" id="delete"><i class="feather-trash-2"></i>
                                                    Sil</a>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                            </div>

                            {{-- END Kurs İçerik Video Başlığı --}}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Start Modal Area  -->
    <div class="rbt-default-modal modal fade" data-backdrop="false" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="rbt-round-btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="feather-x"></i>
                    </button>
                </div>
                <form action="{{ route('add.course.section') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $course->id }}">
                    <div class="modal-body">
                        <div class="inner rbt-default-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="modal-title mb--20" id="exampleModalLabel">Kurs Video İçeriği</h5>
                                    <div class="course-field mb--20">
                                        <label for="modal-field-1">Kurs Video Başlığı</label>
                                        <input name="section_title" id="modal-field-1" type="text">
                                        <small><i class="feather-info"></i> Kurs Detay Bölümünde Yer Alan Kurs Video İçeriği
                                            Bölümü Başlığı Ekleyiniz.</small><br>
                                        <small><i class="feather-info"></i>
                                            Örneğin: Bölüm 1 : Kurs Tanıtımı
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-circle-shape"></div>
                    <div class="modal-footer pt--30">
                        <button type="submit" class="rbt-btn btn-border btn-md radius-round-10"
                            data-bs-dismiss="modal">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Area  -->

    <script>
        function addLectureDiv(courseId, sectionId, containerId) {
            const lectureContainer = document.getElementById(containerId);
            const newLectureDiv = document.createElement('div');
            newLectureDiv.classList.add('lectureDiv');

            newLectureDiv.innerHTML = `
                <div class="rbt-callto-action rbt-cta-default style-2 mt--20">
                    <div class="content-wrapper overflow-hidden pt--10 pb--10 bg-color-grey">
                        <div class="row gy-5 align-items-end">
                            <div class="col-lg-12">
                                <div class="inner">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="course-field mb--30">
                                            <label>Kurs Video Başlığı</label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="course-field mb--30">
                                            <label>Kurs Video Açıklama</label>
                                            <textarea type="text"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="course-field mb--30">
                                            <label for="url">Kurs Video URL</label>
                                            <input id="url" name="url" type="text" placeholder="Video URL">
                                        </div>
                                    </div>
                                    <div class="col-12 mt--20">
                                        <div class="rbt-form-group">
                                            <button onclick="saveLecture('${courseId}','${sectionId}','${containerId}')" class="rbt-btn btn-xs btn-gradient">Kaydet</button>
                                            <button onclick="hideLectureContainer('${containerId}')" class="rbt-btn btn-xs btn-gradient">İptal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            lectureContainer.appendChild(newLectureDiv);
        }

        function hideLectureContainer(containerId) {
            const lectureContainer = document.getElementById(containerId);
            lectureContainer.style.display = 'none';
            location.reload();
        }
    </script>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        function saveLecture(courseId, sectionId, containerId) {
            const lectureContainer = document.getElementById(containerId);
            const lectureTitle = lectureContainer.querySelector('input[type=text]').value;
            const lectureContent = lectureContainer.querySelector('textarea').value;
            const lectureUrl = lectureContainer.querySelector('input[name="url"]').value;

            fetch('{{ route("save-lecture") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    course_id: courseId,
                    section_id: sectionId,
                    lecture_title: lectureTitle,
                    lecture_url: lectureUrl,
                    content: lectureContent,
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);

                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 6000
            })
            if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                    icon: 'success',
                    title: data.success,
                    })
                    location.reload();

            }else{

           Toast.fire({
                    icon: 'error',
                    title: data.error,
                    })
                }
            })
            .catch(error => {
                console.error(error);
            });
        }
    </script>

    <script>
    $(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Emin Misiniz?',
                    text: "İçerik Silinecek?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Onayla',
                    cancelButtonText: 'İptal'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                    }
                  })

    });

  });
    </script>

@endsection
