<?php

namespace App\Http\Controllers\Backend;

use DateTime;
use Carbon\Carbon;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function Raporlar()
    {
        return view('admin.backend.raporlar.raporlar');
    }

    public function GunlukRapor(Request $request)
    {
        $date = Carbon::parse($request->date);
        $formattedDate = $date->isoFormat('DD MMMM YYYY');

        $payment = Payment::where('order_date', $formattedDate)->latest()->get();
        return view('admin.backend.raporlar.gunluk_rapor', compact('formattedDate', 'payment'));
    }

    public function AylikRapor(Request $request){

        $month = $request->month;
        $year = $request->year_name;

        $payment = Payment::where('order_month',$month)->where('order_year',$year)->latest()->get();
        return view('admin.backend.raporlar.aylik_rapor',compact('payment','month','year'));

    }// End Method


    public function YillikRapor(Request $request){

        $year = $request->year;

        $payment = Payment::where('order_year',$year)->latest()->get();
        return view('admin.backend.raporlar.yillik_rapor',compact('payment', 'year'));

    }


}
