<?php

namespace App\Http\Controllers\Backend;

use DB;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\CourseSection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function UserReview(){
        $id = Auth::user()->id;

        $latestOrders = Order::where('user_id', $id)
                         ->select('course_id', DB::raw('MAX(id) as max_id'))
                         ->groupBy('course_id');

        $mycourse = Order::joinSub($latestOrders, 'latest_order', function($join) {
                        $join->on('orders.id', '=', 'latest_order.max_id');
                    })
                    ->orderBy('latest_order.max_id', 'DESC')
                    ->get();

        // Her bir kurs için ilgili yorumları ekliyoruz
        foreach ($mycourse as $course) {
            $review = Review::where('course_id', $course->course_id)
                            ->where('user_id', $id)
                            ->first();
            if ($review) {
                $course->rating = $review->rating;
                $course->comment = $review->comment;
                $course->user_reviewed = true;
            } else {
                $course->rating = null;
                $course->comment = null;
                $course->user_reviewed = false;
            }
        }

        return view('frontend.review.user_review',compact('mycourse','id'));
    }

    public function UserReviewCreate($course_id)
    {
        $courseContent = Course::find($course_id);
        return view('frontend.review.user_review_create', compact('courseContent'));
    }

    public function UserStoreReview(Request $request)
    {
        $course = $request->course_id;
        $instructor = $request->instructor_id;

        $request->validate([
            'comment' => 'required',
        ]);

        Review::insert([
            'course_id' => $course,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->rate,
            'instructor_id' => $instructor,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Yorumunuz Başarılı Şekilde Gönderildi.',
            'alert-type' =>'success'
        );
        return redirect()->route('user.review')->with($notification);
    }

    public function AdminPedingReview()
    {
        $review = Review::where('status',0)->orderBy('id','DESC')->get();
        return view('admin.backend.review.pending_review',compact('review'));
    }

    public function UpdateReviewStatus(Request $request)
    {
        $reviewId = $request->input('review_id');
        $isChecked = $request->input('is_checked',0);

        $review = Review::find($reviewId);
        if ($review) {
            $review->status = $isChecked;
            $review->save();
        }

        return response()->json(['message' => 'Kurs Yorum Durumu Güncellendi']);
    }

    public function AdminActiveReview()
    {
        $review = Review::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.backend.review.active_review',compact('review'));
    }

    public function InstructorAllReview()
    {
        $id = Auth::user()->id;
        $review = Review::where('instructor_id',$id)->where('status',1)->orderBy('id','DESC')->get();
        return view('instructor.review.all_review',compact('review'));
    }
}
