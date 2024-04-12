@extends('instructor.instructor_dashboard')
@section('instructorcontent')

<div class="col-lg-9">
    <!-- Start Enrole Course  -->
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
        <div class="content">
            <div class="section-title">
                <h4 class="rbt-title-style-3">Kurs Yorumları</h4>
            </div>

            <div class="rbt-dashboard-table table-responsive mobile-table-750">
                <table class="rbt-table table table-borderless">
                    <thead>
                        <tr>
                            <th>Kurs Adı</th>
                            <th>Kullanıcı Adı</th>
                            <th>Yorum</th>
                            <th>Değerlendirme</th>
                            <th>Durum</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($review as $item)

                        <tr>
                            <td>
                                <span class="b3">{{ $item['course']['course_name'] }}</span>
                            </td>
                            <td>
                                <span class="b3">{{ $item['user']['name'] }}</span>
                            </td>
                            <td>
                                <p class="b2">{{ $item->comment }}</p>
                            </td>
                            <td>
                                <div class="rbt-review">
                                    <div class="rating">
                                        @if ($item->rating == NULL)
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @elseif($item->rating == 1)
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @elseif($item->rating == 2)
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @elseif($item->rating == 3)
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @elseif($item->rating == 4)
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @elseif($item->rating == 5)
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($item->status == 1)
                                    <span class="rbt-badge-5 bg-color-success-opacity color-success">Yorum Onaylandı</span>
                                @else
                                    <span class="rbt-badge-5 bg-color-success-opacity color-success">Yorum Onay Bekliyor</span>
                                @endif
                            </td>
                        </tr>

                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <!-- End Enrole Course  -->
</div>
@endsection
