<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user = User::where("id", "=", Auth::user()->id)->get();
        $countwawancara = Post::where("condition", NULL)->count();
        $countrevisi = Post::where("condition", 2)->count();
        $countselesai = Post::where("condition", 3)->count();

        return view('beranda', compact('user', 'countwawancara', 'countselesai', 'countrevisi'));
    }

    public function beranda()
    {

        return view('beranda');
    }


}
