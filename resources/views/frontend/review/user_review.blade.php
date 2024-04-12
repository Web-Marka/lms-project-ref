@extends('frontend.dashboard.user_dashboard')
@section('userdashboard')

<div class="col-lg-9">
    <!-- Start Enrole Course  -->
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
        <div class="content">
            <div class="section-title">
                <h4 class="rbt-title-style-3">Yorumlarım</h4>
            </div>

            <div class="rbt-dashboard-table table-responsive mobile-table-750">
                <table class="rbt-table table table-borderless">
                    <thead>
                        <tr>
                            <th>Kurs</th>
                            <th>Yorum</th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($mycourse as $item)

                        <tr>
                            <th>
                                <span class="b3"><a href="#">{{ $item->course->course_name }}</a></span>
                            </th>
                            <td>
                                @if($item->user_reviewed && $item->user->id == Auth::id())
                                    @if($item->rating !== NULL && $item->comment !== NULL)
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
                                        <p class="b2">{{ $item->comment }}</p>
                                    @else
                                        <p class="b2">Henüz Yorum Yapılmadı</p>
                                    @endif
                                @else
                                    <p class="b2">Henüz Yorum Yapılmadı</p>
                                @endif
                            </td>
                            <td>
                                @if($item->user_reviewed)
                                    <div class="rbt-button-group justify-content-end mt--10">
                                        <span class="rbt-badge-5 bg-color-success-opacity color-success">Yorum Yapıldı</span>
                                    </div>
                                @else
                                    <div class="rbt-button-group justify-content-end">
                                        <a class="rbt-btn btn-xs bg-primary-opacity radius-round" href="{{ route('user.review.create', ['course_id' => $item->course_id]) }}" title="Yorum Yap"><i class="feather-message-circle pl--0"></i> Yorum Yap</a>
                                    </div>
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
