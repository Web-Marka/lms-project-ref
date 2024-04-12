<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Payment;
use App\Models\CourseSection;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function BekleyenSiparisler()
    {
        $payment = Payment::where('status','bekliyor')->orderBy('id','DESC')->get();
        return view('admin.backend.siparisler.bekleyen_siparisler', compact('payment'));
    }

    public function TamamlananSiparisler()
    {
        $payment = Payment::where('status','tamamlandı')->orderBy('id','DESC')->get();
        return view('admin.backend.siparisler.tamamlanan_siparisler', compact('payment'));
    }

    public function SiparisDetay($payment_id)
    {
        $payment = Payment::where('id', $payment_id)->first();
        $orderItem = Order::where('payment_id', $payment_id)->orderBy('id','DESC')->get();
        return view('admin.backend.siparisler.siparis_detay', compact('payment','orderItem'));
    }

    public function SiparisOnayla($payment_id)
    {
        Payment::find($payment_id)->update(['status' => 'tamamlandı']);

        $notification = array(
            'message' => 'Order Confrim Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.tamamlanan.siparisler')->with($notification);
    }

    public function InstructorOrder()
    {
        $id = Auth::user()->id;
        $latestOrderItem = Order::where('instructor_id',$id)
        ->select('payment_id', \DB::raw('MAX(id) as max_id'))
        ->groupBy('payment_id');

        $orderItem = Order::joinSub($latestOrderItem, 'latest_order', function($join) {
            $join->on('orders.id', '=', 'latest_order.max_id');
        })->orderBy('latest_order.max_id', 'DESC')->get();

        return view('instructor.siparisler.all_order', compact('orderItem'));
    }

    public function InstructorOrderInvoice($payment_id)
    {
        $payment = Payment::where('id',$payment_id)->first();
        $orderItem = Order::where('payment_id',$payment_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('instructor.siparisler.siparis_pdf', compact('payment','orderItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }

    public function MyCourse(){
        $id = Auth::user()->id;

        $latestOrders = Order::where('user_id',$id)->select('course_id', \DB::raw('MAX(id) as max_id'))->groupBy('course_id');

        $mycourse = Order::joinSub($latestOrders, 'latest_order', function($join) {
            $join->on('orders.id', '=', 'latest_order.max_id');
        })->orderBy('latest_order.max_id','DESC')->get();

        return view('frontend.mycourse.my_all_course',compact('mycourse'));

    }// End Method


    public function CourseView($course_id){
        $id = Auth::user()->id;

        $course = Order::where('course_id',$course_id)->where('user_id',$id)->first();
        $section = CourseSection::where('course_id',$course_id)->orderBy('id','asc')->get();

        return view('frontend.mycourse.course_view',compact('course','section'));

    }// End Method
}
