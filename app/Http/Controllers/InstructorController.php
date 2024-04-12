<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    public function InstructorDashboard(){
        return view('instructor.index');
    }

    public function InstructorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Çıkış Başarılı',
            'alert-type' =>'success'
        );

        return redirect('/')->with($notification);
    }

    public function InstructorLogin()
    {
        return view('instructor.instructor_login');
    }

    public function InstructorProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('instructor.instructor_profile_view' , compact('profileData'));
    }

    public function InstructorProfileStore(Request $request)
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
        $data->instructor_bio = $request->instructor_bio;
        $data->created_at = $request->created_at;
        $data->updated_at = $request->updated_at;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/instructor_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/instructor_images'),$filename);
            $data['photo'] = $filename;
        }

        if ($request->file('profile_banner')) {
            $file = $request->file('profile_banner');
            @unlink(public_path('upload/instructor_images/'.$data->profile_banner));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/instructor_images'),$filename);
            $data['profile_banner'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Eğitmen Profil Bilgileri Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function InstructorChangePassword(Request $request)
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

    public function InstructorProfileSocial(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        if (!$data) {
            return redirect()->back()->withErrors(['message' => 'Kullanıcı bulunamadı.']);
        }

        $validatedData = $request->validate([
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
        ]);

        $data->fill($validatedData);
        $data->save();

        $notification = array(
            'message' => 'Eğitmen Profil Bilgileri Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
