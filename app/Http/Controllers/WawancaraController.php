<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use App\Post;
use App\User;

class WawancaraController extends Controller
{
    public function index(User $user)
    {
    	return view('wawancara', compact('user'));
    }

    public function create(User $user)
    {
    	$questions = Questions::all();
    	return view('tambahwawancara', compact('questions', 'user'));
    }

    public function showTable(User $user)
 	  {
 	 	$posts = Post::paginate(10);
 	 	$posts->links();

 		return view('revisi', compact('posts', 'user'));
 	  }

    public function selesai(User $user)
    {
        $posts = Post::paginate(10);
        $posts->links();
        
        return view('selesai', compact('posts', 'user'));
    }

    public function store(Request $request)
    {
    	$rules = [];
        foreach($request->input('answer') as $key => $value) {
            $rules["answer.{$key}"] = 'required';
            Questions::create(['answer'=>$value]);
        }        
        
        return redirect()->back();
    }
}
