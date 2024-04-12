<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function AllUser()
    {
        $users = User::where('role','user')->latest()->get();
        return view('admin.backend.user.all_user',compact('users'));
    }

    public function ActiveAllInstructor(){
        $users = User::where('role','instructor')->latest()->get();
        return view('admin.backend.user.all_instructor',compact('users'));

    }
}
