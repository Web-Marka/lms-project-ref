@extends('instructor.instructor_dashboard')
@section('instructorcontent')
    <div class="col-lg-9">
        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
            <div class="content">
                <div class="section-title">
                    <h4 class="rbt-title-style-3">Kurs Ekle</h4>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form id="add_course" action="{{ route ('update.course') }}" method="post" enctype="multipart/form-data"
                            class="rbt-profile-row rbt-default-form row row--15">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="course-field mb--30">
                                    <label for="course_name">Kurs Başlığı</label>
                                    <input id="course_name" name="course_name" type="text" value="{{ $course->course_name }}">
                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> Maksimum 255 Karakter
                                        Olmalıdır</small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="course-field mb--30">
                                    <label for="duration">Kurs Süresi</label>
                                    <input id="duration" name="duration" type="text" value="{{ $course->duration }}">
                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> Örnek: 60 (Saat)</small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="course-field mb--30">
                                    <label for="certificate">Kurs Sertifika</label>
                                    <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10">
                                        <select class="w-100" name="certificate">
                                            <option value="Yes" {{ $course->certificate == '1' ? 'selected' : '' }}>Evet</option>
                                            <option value="No" {{ $course->certificate == '0' ? 'selected' : '' }}>Hayır</option>
                                        </select>
                                    </div>
                                    <small class="d-block mt_dec--15"><i class="feather-info"></i> Kurs Sonunda Sertifika
                                        Kazanımı</small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="course-field mb--30">
                                    <label for="language">Kurs Dili</label>
                                    <input id="language" name="language" type="text" value="{{ $course->language }}">
                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> Örnek: Türkçe</small>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <hr class="mt--10 mb--20">
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                <div class="course-field mb--30">
                                    <label for="course_content">Kurs Açıklama</label>
                                    <textarea name="course_content" id="course_content">{{ $course->course_content }}</textarea>
                                    <small class="d-block mt_dec--20"><i class="feather-info"></i> Kurs Açıklama Yazı
                                        İçeriği</small>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <hr class="mt--10 mb--20">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="col-lg-12">
                                    <div class="course-field mb--30">
                                        <label for="requirements">Sertifika Süreci</label>
                                        <textarea name="requirements" id="requirements">{{ $course->requirements }}</textarea>
                                        <small class="d-block mt_dec--20"><i class="feather-info"></i> Her maddenin sonuna "\n" eklemeliyiz.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="col-lg-12">
                                    <div class="course-field mb--30">
                                        <label for="course_description">Sertifika Bilgileri</label>
                                        <textarea name="course_description" id="course_description">{{ $course->course_description }}</textarea>
                                        <small class="d-block mt_dec--20"><i class="feather-info"></i> Her maddenin sonuna "\n" eklemeliyiz.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <hr class="mt--10 mb--20">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="course-field mb--30 edu-bg-gray">
                                    <label for="selling_price">Sabit Kurs Fiyatı ₺</label>
                                    <input id="selling_price" name="selling_price" type="text"
                                    value=" {{ $course->selling_price }}">
                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> İndirimsiz Sabit Kurs Fiyatı</small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="course-field mb--30 edu-bg-gray">
                                    <label for="discount_price">Satış Fiyatı ₺ </label>
                                    <input id="discount_price" name="discount_price" type="text"
                                    value=" {{ $course->discount_price }}">
                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> İndirimli Satış Fiyatı (İndirim Yoksa Boş Bırakılabilir)</small>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <hr class="mt--10 mb--20">
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                <div class="course-field mb--30">
                                    <label for="course_meta_description">Kurs Meta Açıklama</label>
                                    <textarea name="course_meta_description">{{ $course->course_meta_description }}</textarea>
                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> Kurs Başlığının Altında
                                        Görünecek Kısım.</small>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <hr class="mt--10 mb--20">
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                <div class="course-field mb--30">
                                    <label for="video">Kurs Tanıtım Video URL</label>
                                    <input id="video" name="video" type="text" value="{{ $course->video }}">
                                    <small class="d-block mt_dec--5">Örnek: <a
                                            href="https://www.youtube.com/watch?v=yourvideoid">https://www.youtube.com/watch?v=yourvideoid</a></small>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <hr class="mt--10 mb--20">
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                <div class="course-field mb--30">
                                    <label for="category_id">Kurs Kategori</label>
                                    <div class="rbt-modern-select bg-transparent height-45 mb--10">
                                        <select class="w-100" name="category_id" id="category_id">
                                            <option selected="" disabled>Lütfen Bir Kategori Seçiniz</option>

                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $course->category_id ? 'selected' : ''}}>
                                                    {{ $cat->category_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                <div class="course-field mb--30">
                                    <label for="subcategory_id">Kurs Alt Kategori</label>
                                    <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10">
                                        <select class="w-100" name="subcategory_id" id="subcategory_id">
                                            <option selected="" disabled>Lütfen Bir Kategori Seçiniz</option>

                                            @foreach ($subcategories as $subcat)
                                                <option value="{{ $subcat->id }}" {{ $subcat->id == $course->subcategory_id ? 'selected' : ''}}>
                                                    {{ $subcat->subcategory_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt--20">
                                <div class="rbt-form-group">
                                    <button type="submit" class="rbt-btn btn-gradient">Kurs Güncelle</button>
                                </div>
                            </div>
                        </form>

                        <form action="{{ route ('update.course.image') }}" method="post" enctype="multipart/form-data"
                            class="rbt-profile-row rbt-default-form row row--15">
                            @csrf
                            <input type="hidden" name="id" value="{{ $course->id }}">
                            <input type="hidden" name="old_img" value="{{ $course->course_image }}">
                            <div class="col-lg-12">
                                <hr class="mt--10 mb--20 mt--50">
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                <div class="course-field mb--30">
                                    <label>Kurs Görseli</label>
                                    <div class="rbt-create-course-thumbnail upload-area">
                                        <div class="upload-area">
                                            <div class="brows-file-wrapper" data-black-overlay="9">
                                                <input name="course_image" id="createinputfile" type="file"
                                                    class="inputfile" />
                                                <img id="createfileImage"
                                                    src="{{ asset($course->course_image) }}" alt="file image">
                                                <label class="d-flex" for="createinputfile" title="No File Choosen">
                                                    <i class="feather-upload"></i>
                                                    <span class="text-center">Görsel Seç</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <small><i class="feather-info"></i> <b>Boyut:</b> 710x488 pixels, <b>Desteklenen
                                            Dosyalar:</b> JPG, JPEG, PNG, WEBP</small>
                                </div>
                            </div>
                            <div class="col-12 mt--20">
                                <div class="rbt-form-group">
                                    <button type="submit" class="rbt-btn btn-gradient">Kurs Görseli Güncelle</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#add_course').validate({
                rules: {
                    course_name: {
                        required : true,
                    },
                    selling_price: {
                        required : true,
                    },
                },
                messages :{
                    category_name: {
                        required : 'Bu Alan Gerekli!',
                    },
                    selling_price: {
                        required : 'Bu Alan Gerekli!',
                    },
                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#add_course select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/"+category_id,
                        type: "GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="subcategory_id"]').html('');
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

@endsection
