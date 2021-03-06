<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Post;
use App\Category;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(User $user)
    {
    	$users = User::all();
      $countmasuk = Post::where("condition", 1)->count();
      $countrev = Post::where("condition", 3)->count();
      $countsel = Post::where("condition", 4)->count();
      $question = Category::orderBy('created_at', 'asc')->first();
        return view('beranda2', compact('users', 'countmasuk', 'countrev', 'countsel', 'question'));
    }

    public function usersdestroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('danger', 'User Berhasil Dihapus');
    }

}
