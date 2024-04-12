<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Mail\Orderconfirm;
use Illuminate\Http\Request;
use App\Services\PaytrService;
use App\Http\Controllers\Controller;
use App\Notifications\OrderComplete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Notification;

class PaytrController extends Controller
{
    public function CreditCardPage()
    {
        if (Auth::check()) {

            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartTotal = Cart::total();
                $cartQty = Cart::count();

                return view('frontend.sepetim.payment_credit_cart', compact('carts', 'cartTotal', 'cartQty'));
            } else {

                $notification = array(
                    'message' => 'Lütfen Sepetinize En Az Bir Kurs Ekleyin',
                    'alert-type' => 'error'
                );
                return redirect()->to('/')->with($notification);
            }
        } else {

            $notification = array(
                'message' => 'İşleminize Devam Edebilmeniz İçin Lütfen Önce Giriş Yapınız',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);
        }
    }

    public function CreditCardSend(Request $request)
    {
        $user = User::where('role', 'admin')->get();

        $data = session()->get('payment_data');
        $carts = session()->get('cart_data');
        $cartTotal = session()->get('cart_total');
        $cartQty = session()->get('cart_qty');

        $cardData = array();
        $cardData['cc_owner'] = $request->cc_owner;
        $cardData['card_number'] = $request->card_number;
        $cardData['expiry_month'] = $request->expiry_month;
        $cardData['expiry_year'] = $request->expiry_year;
        $cardData['cvv'] = $request->cvv;

        // Ödeme kaydını oluştur
        $payment = new Payment();
        $payment->name = $data['name'];
        $payment->email = $data['email'];
        $payment->phone = $data['phone'];
        $payment->address = $data['address'];
        $payment->city = $data['city'];
        $payment->town = $data['town'];
        $payment->cash_delivery = 'PAYTR';
        $payment->total_amount = $cartTotal;
        $payment->payment_type = 'card';
        $payment->invoice_no = 'LMS' . mt_rand(10000000, 99999999);
        $payment->order_date = now()->locale('tr_TR')->isoFormat('DD MMMM YYYY');
        $payment->order_month = now()->locale('tr_TR')->isoFormat('MMMM');
        $payment->order_year = now()->locale('tr_TR')->isoFormat('YYYY');
        $payment->status = 'tamamlandı';
        $payment->save();

        // Sepet içeriğini kaydet
        foreach ($carts as $cartItem) {
            $existingOrder = Order::where('user_id', Auth::user()->id)
                ->where('course_id', $cartItem->id)
                ->first();

            if ($existingOrder) {
                $notification = [
                    'message' => 'Bu Kursa Zaten Sahipsiniz.',
                    'alert-type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }

            $order = new Order();
            $order->payment_id = $payment->id;
            $order->user_id = Auth::user()->id;
            $order->course_id = $cartItem->id;
            $order->instructor_id = $cartItem->options->instructor;
            $order->course_title = $cartItem->name;
            $order->price = $cartItem->price;
            $order->save();
        }

        // Sepeti temizle
        $request->session()->forget('cart');

        // E-posta gönderme ve bildirim
        $sendmail = Payment::find($payment->id);
        $mailData = [
            'invoice_no' => $sendmail->invoice_no,
            'amount' => $cartTotal,
            'name' => $sendmail->name,
            'email' => $sendmail->email,
        ];

        Mail::to($mailData['email'])->send(new Orderconfirm($mailData));
        Notification::send($user, new OrderComplete($mailData['name']));

        return (new PaytrService())->sendData($request, $data, $carts, $cartTotal, $cartQty);
    }
}
