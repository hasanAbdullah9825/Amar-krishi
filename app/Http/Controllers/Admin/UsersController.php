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

        return view('admin.user.index')->with('users', $users);
    }

    public function makeAdmin(User $user)
    {
        $user->update(['role_id' => 1]);
        $message = "Now $user->name is Admin";
        session()->flash('success', $message);
        return redirect(route('admin.users'));
    }
}
