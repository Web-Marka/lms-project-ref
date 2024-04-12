<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kupon;
use App\Models\Order;
use App\Models\Course;
use App\Models\Payment;
use App\Mail\Orderconfirm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\OrderComplete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Notification;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        $course = Course::find($id);

        if (Session::has('kupon')) {
            Session::forget('kupon');
        }

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {
            return response()->json(['error' => 'Kurs Zaten Sepetinizde Mevcut']);
        }

        if ($course->discount_price == NULL) {

            Cart::add([
                'id' => $id,
                'name' => $request->course_name,
                'qty' => 1,
                'price' => $course->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $course->course_image,
                    'slug' => $request->course_name_slug,
                    'instructor' => $request->instructor,
                ],
            ]);

        }else{

            Cart::add([
                'id' => $id,
                'name' => $request->course_name,
                'qty' => 1,
                'price' => $course->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $course->course_image,
                    'slug' => $request->course_name_slug,
                    'instructor' => $request->instructor,
                ],
            ]);
        }
        return response()->json(['success' => 'Sepetinize Eklendi']);
    }

    public function CartData()
    {
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();

        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty,
        ));
    }

    public function AddHeaderCart()
    {
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();

        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty,
        ));
    }

    public function RemoveHeaderCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Kurs Sepetinizden Silindi']);
    }

    public function MyCart ()
    {
        return view('frontend.sepetim.mycart');
    }

    public function GetCartCourse()
    {
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();

        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty,
        ));
    }

    public function RemoveCart($rowId)
    {
        Cart::remove($rowId);
        if(Session::has('kupon')){

            $kupon_adi = Session::get('kupon')['kupon_adi'];
            $kupon = Kupon::where('kupon_adi',$kupon_adi)->first();

            Session::put('kupon',[
                'kupon_adi' => $kupon->kupon_adi,
                'kupon_indirim_tutari' => $kupon->kupon_indirim_tutari,
                'discount_amount' => round(Cart::total() * $kupon->kupon_indirim_tutari/100),
                'total_amount' => round(Cart::total() - Cart::total() * $kupon->kupon_indirim_tutari/100 )
            ]);
        }
        return response()->json(['success' => 'Kurs Sepetinizden Silindi']);
    }

    public function KuponUygula(Request $request)
    {
        $kupon = Kupon::where('kupon_adi',$request->kupon_adi)->where('kupon_gecerlilik','>=',Carbon::now()->format('Y-m-d'))->first();

        if ($kupon) {
            Session::put('kupon', [
                'kupon_adi' => $kupon->kupon_adi,
                'kupon_indirim_tutari' => $kupon->kupon_indirim_tutari,
                'discount_amount' => round(Cart::total() * (float) str_replace(',', '', $kupon->kupon_indirim_tutari) / 100),
                'total_amount' => round(Cart::total() - Cart::total() * (float) str_replace(',', '', $kupon->kupon_indirim_tutari) / 100)
            ]);

            return response()->json(array(
                'kupon_gecerlilik' => true,
                'success' => 'Kupon Başarılı Şekilde Uygulandı'
            ));

        }else {
            return response()->json(['error' => 'Geçersiz Kupon']);
        }
    }

    public function KuponHesaplama()
    {
        if (Session::has('kupon')) {
            return response()->json(array(
             'subtotal' => Cart::total(),
             'kupon_adi' => session()->get('kupon')['kupon_adi'],
             'kupon_indirim_tutari' => session()->get('kupon')['kupon_indirim_tutari'],
             'discount_amount' => session()->get('kupon')['discount_amount'],
             'total_amount' => session()->get('kupon')['total_amount'],
            ));
         } else{
             return response()->json(array(
                 'total' => Cart::total(),
             ));
         }
    }

    public function KuponRemove() {
        Session::forget('kupon');
        return response()->json(['success' => 'Kupon Kaldırıldı']);
    }

    public function Odeme()
    {
        if (Auth::check()) {

            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartTotal = Cart::total();
                $cartQty = Cart::count();

                return view('frontend.sepetim.odeme',compact('carts','cartTotal','cartQty'));
            } else{

                $notification = array(
                    'message' => 'Lütfen Sepetinize En Az Bir Kurs Ekleyin',
                    'alert-type' => 'error'
                );
                return redirect()->to('/')->with($notification);
            }

        }else{

            $notification = array(
                'message' => 'İşleminize Devam Edebilmeniz İçin Lütfen Önce Giriş Yapınız',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);

        }
    }

    public function Payment(Request $request)
    {
        $user = User::where('role','admin')->get();

        if (Session::has('kupon')) {
            $total_amount = Session::get('kupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['town'] = $request->town;
        $data['course_title'] = $request->course_title;
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();

        if ($request->cash_delivery == 'card') {
            session()->put('payment_data', $data);
            session()->put('cart_data', $carts);
            session()->put('cart_total', $cartTotal);
            session()->put('cart_qty', $cartQty);
            return view('frontend.sepetim.payment_credit_cart',compact('data','cartTotal','carts','cartQty'));
        } elseif($request->cash_delivery == 'havale'){

        // Cerate a new Payment Record

        $data = new Payment();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->town = $request->town;
        $data->cash_delivery = $request->cash_delivery;
        $data->total_amount = $total_amount;
        $data->payment_type = 'Direct Payment';
        $data->invoice_no = 'LMS' . mt_rand(10000000, 99999999);
        $data->order_date = Carbon::now()->locale('tr_TR')->isoFormat('DD MMMM YYYY');
        $data->order_month = Carbon::now()->locale('tr_TR')->isoFormat('MMMM');
        $data->order_year = Carbon::now()->locale('tr_TR')->isoFormat('YYYY');
        $data->status = 'bekliyor';
        $data->created_at = Carbon::now();
        $data->save();


       foreach ($request->course_title as $key => $course_title) {

            $existingOrder = Order::where('user_id',Auth::user()->id)->where('course_id',$request->course_id[$key])->first();

            if ($existingOrder) {

                $notification = array(
                    'message' => 'Bu Kursa Zaten Sahipsiniz.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            } // end if

            $order = new Order();
            $order->payment_id = $data->id;
            $order->user_id = Auth::user()->id;
            $order->course_id = $request->course_id[$key];
            $order->instructor_id = $request->instructor_id[$key];
            $order->course_title = $course_title;
            $order->price = $request->price[$key];
            $order->save();

           }

           $request->session()->forget('cart');

           $paymentId = $data->id;

           $sendmail = Payment::find($paymentId);
           $data = [
                'invoice_no' => $sendmail->invoice_no,
                'amount' => $total_amount,
                'name' => $sendmail->name,
                'email' => $sendmail->email,
           ];

           Mail::to($request->email)->send(new Orderconfirm($data));

           Notification::send($user, new OrderComplete($request->name));

           $notification = array(
            'message' => 'Havale İle Ödeme Alındı',
            'alert-type' => 'success'
            );
        return redirect()->route('index')->with($notification);

        }

    }

    public function BuyToCart(Request $request, $id)
    {
        $course = Course::find($id);
        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id){
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {
            return response()->json(['error' => 'Kurs Sepetinizde Zaten Mevcut']);
        }

        if ($course->discount_price == NULL) {
            Cart::add([
                'id'        => $id,
                'name'      => $request->course_name,
                'qty'       => 1,
                'price'     => $course->selling_price,
                'weight'        => 1,
                'options'       => [
                    'image'         => $course->course_image,
                    'slug'          => $course->course_name_slug,
                    'instructor'    => $course->instructor_id,
                ],
            ]);
        } else {
            Cart::add([
                'id'        => $id,
                'name'      => $request->course_name,
                'qty'       => 1,
                'price'     => $course->discount_price,
                'weight'        => 1,
                'options'       => [
                    'image'         => $course->course_image,
                    'slug'          => $course->course_name_slug,
                    'instructor'    => $course->instructor_id,
                ],
            ]);
        }
        return response()->json(['success' => 'Kurs Sepetinize Eklendi']);
    }

    public function MarkAsRead(Request $request, $notificationId){

        $user = Auth::user();
        $notification = $user->notifications()->where('id',$notificationId)->first();

        if ($notification) {
            $notification->markAsRead();

        }
        return response()->json(['count' => $user->unreadNotifications()->count()]);

    }

}
