<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function index()
    {

        $users = User::all();

        return view('admin.user.users')->with('users', $users);
    }

    public function makeAdmin(User $user)
    {
        $user->update(['role_id' => 1]);
        $message = " $user->name কে এডমিন করা হয়েছে";
        session()->flash('successMessage', $message);
        return redirect(route('admin.users'));
    }
}
