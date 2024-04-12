<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Kupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KuponController extends Controller
{
    public function Kuponlar()
    {
        $kupon = Kupon::latest()->get();
        return view('admin.backend.kupon.kuponlar', compact('kupon'));
    }

    public function KuponEkle()
    {
        return view('admin.backend.kupon.kupon_ekle');
    }

    public function StoreKupon(Request $request)
    {
        Kupon::insert([
            'kupon_adi' => strtoupper($request->kupon_adi),
            'kupon_indirim_tutari' => $request->kupon_indirim_tutari,
            'kupon_gecerlilik' => $request->kupon_gecerlilik,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Kupon Başarılı Şekilde Eklendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.kuponlar')->with($notification);
    }

    public function EditKupon($id)
    {
        $kupon = Kupon::find($id);
        return view('admin.backend.kupon.kupon_duzenle', compact('kupon'));
    }

    public function UpdateKupon(Request $request)
    {
        $kuponid = $request->id;

        Kupon::find($kuponid)->update([
            'kupon_adi' => $request->kupon_adi,
            'kupon_indirim_tutari' => $request->kupon_indirim_tutari,
            'kupon_gecerlilik' => $request->kupon_gecerlilik,
        ]);

        $notification = array(
            'message' => 'Kupon Başarılı Şekilde Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.kuponlar')->with($notification);

    }

    public function DeleteKupon($id)
    {
        Kupon::find($id)->delete();

        $notification = array(
            'message' => 'Kupon Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.kuponlar')->with($notification);
    }
}
