<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Çıkış Başarılı',
            'alert-type' =>'success'
        );

        return redirect('/admin/login')->with($notification);
    }

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view' , compact('profileData'));
    }

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profil Bilgileri Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword(Request $request)
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

    public function BecomeInstructor()
    {
        return view('frontend.instructor.register_instructor');
    }

    public function InstructorRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'unique:users'],
        ]);

        User::insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'town' => $request->town,
            'instructor_bio' => $request->instructor_bio,
            'password' => Hash::make($request->password),
            'role' => 'instructor',
            'status' => '0',
        ]);

        $notification = array(
            'message' => 'Eğitmen Kaydı Başarılı Şekilde Oluşturuldu.',
            'alert-type' =>'success'
        );
        return redirect()->route('instructor.login')->with($notification);
    }

    // Eğitmen Metodları

    public function AllInstructor()
    {
        $allinstructor = User::where('role','instructor')->latest()->get();
        return view('admin.backend.instructor.all_instructor', compact('allinstructor'));
    }

    public function UpdateUserStatus (Request $request)
    {
        $userId = $request->input('user_id');
        $isChecked = $request->input('is_checked',0);
        $user = User::find($userId);
        if ($user) {
            $user->status = $isChecked;
            $user->save();
        }
        return response()->json(['message' => 'Kullanıcı Durumu Güncellendi']);
    }

    // Kurs Metodları

    public function AdminAllCourse ()
    {
        $course = Course::latest()->get();
        return view('admin.backend.course.all_course', compact('course'));
    }

    public function UpdateCourseStatus (Request $request)
    {
        $courseId = $request->input('course_id');
        $isChecked = $request->input('is_checked',0);
        $course = Course::find($courseId);
        if ($course) {
            $course->status = $isChecked;
            $course->save();
        }
        return response()->json(['message' => 'Kurs Durumu Güncellendi']);
    }

    public function AdminCourseDetails($id)
    {
        $coursedetails = Course::find($id);
        return view('admin.backend.course.course_details', compact('coursedetails'));
    }

    // Yönetici İşlemleri

    public function Yoneticiler() 
    {
        $yoneticiler = User::where('role','admin')->get(); 
        return view('admin.backend.yoneticiler.yoneticiler',compact('yoneticiler'));
    }

    public function YoneticiEkle()
    {
        $roles = Role::all();
        return view('admin.backend.yoneticiler.yonetici_ekle', compact('roles'));
    }

    public function YoneticiEklePost(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = '1';
        $user->save();

        if ($request->roles) {
            $role = Role::find($request->get('roles'));
            $user->assignRole($role->name);
        }

        $notification = array(
            'message' => 'Yönetici Başarılı Şekilde Oluşturuldu.',
            'alert-type' =>'success'
        );
        return redirect()->route('yoneticiler')->with($notification);
    }

    public function YoneticiDuzenle($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.backend.yoneticiler.yonetici_duzenle',compact('user','roles'));
    }

    public function YoneticiUpdate (Request $request, $id)
    {
        $user = User::find($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'admin';
        $user->status = '1';
        $user->save();

        $user->roles()->detach();

        if ($request->roles) {
            $role = Role::find($request->get('roles'));
            $user->assignRole($role->name);
        }

        $notification = array(
            'message' => 'Yönetici Başarılı Şekilde Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('yoneticiler')->with($notification);
    }

    public function YoneticiSil($id)
    {
        $deleteYonetici = User::find($id);

        User::find($id)->delete();

        $notification = array(
            'message' => 'Yönetici Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('yoneticiler')->with($notification);
    }
}
