<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Hakkimizda;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Index()
    {
        $hakkimizda = Hakkimizda::find(1);
        return view('frontend.index',compact('hakkimizda'));
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('frontend.dashboard.user_profile_view' , compact('profileData'));
    }

    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Çıkış Başarılı',
            'alert-type' =>'success'
        );

        return redirect('/login')->with($notification);
    }

    public function UserProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->town = $request->town;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['photo'] = $filename;
        }

        if ($request->file('profile_banner')) {
            $file = $request->file('profile_banner');
            @unlink(public_path('upload/user_images/'.$data->profile_banner));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_banner'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Kullanıcı Profil Bilgileri Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function UserChangePassword(Request $request)
    {
        $request->validate([
            'old_password'  =>  'required',
            'new_password'  =>  'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message' => 'Mevcut şifreyi yanlış girildi!',
                'alert-type' =>'error'
            );
            return back()->with($notification);
        }

        // Update Password
        User::whereId(auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Şifre başarılı şekilde değiştirildi.',
            'alert-type' =>'success'
        );
        return back()->with($notification);
    }

    public function UserOrder()
    {
        $id = Auth::user()->id;
        $latestOrderItem = Order::where('user_id',$id)
        ->select('payment_id', \DB::raw('MAX(id) as max_id'))
        ->groupBy('payment_id');

        $orderItem = Order::joinSub($latestOrderItem, 'latest_order', function($join) {
            $join->on('orders.id', '=', 'latest_order.max_id');
        })->orderBy('latest_order.max_id', 'DESC')->get();

        return view('frontend.dashboard.userorders.user_all_orders', compact('orderItem'));
    }

    public function UserOrderInvoice($payment_id)
    {
        $payment = Payment::where('id',$payment_id)->first();
        $orderItem = Order::where('payment_id',$payment_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('instructor.siparisler.siparis_pdf', compact('payment','orderItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}
