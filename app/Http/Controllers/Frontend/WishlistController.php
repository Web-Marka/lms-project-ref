<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function AddToWishList(Request $request, $course_id){

        if (Auth::check()) {
           $exists = Wishlist::where('user_id',Auth::id())->where('course_id',$course_id)->first();

           if (!$exists) {
            Wishlist::insert([
                'user_id' => Auth::id(),
                'course_id' => $course_id,
                'created_at' => Carbon::now(),
            ]);
            return response()->json(['success' => 'Kurs İstek Listenize Eklendi']);
           }else {
            return response()->json(['error' => 'Bu Kurs İstek Listenizde Mevcut']);
           }

        }else{
            return response()->json(['error' => 'Hesabınıza Yapmalısınız']);
        }

    } // End Method


    public function AllWishlist(){

        return view('frontend.wishlist.all_wishlist');

    }// End Method


    public function GetWishlistCourse(){

        $wishlist = Wishlist::with('course')->where('user_id',Auth::id())->latest()->get();

        $wishQty = Wishlist::count();

        return response()->json(['wishlist' => $wishlist, 'wishQty' => $wishQty]);

    }// End Method

    public function RemoveWishlist($id){

        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Kurs İstek Listesinden Kaldırıldı']);

    }
}
