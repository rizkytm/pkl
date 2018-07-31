<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin(User $user)
    {
    	$user = User::where("id", "=", Auth::user()->id)->get();
        return view('beranda2', compact('user'));
    }


}
