<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(User $user)
    {
    	$users = User::all();
        return view('beranda2', compact('users'));
    }

    public function usersdestroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('danger', 'User Berhasil Dihapus');
    }

}
