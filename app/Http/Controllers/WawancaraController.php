<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Post;
use App\User;
use Auth;

class WawancaraController extends Controller
{
    public function index()
    {
    	return view('wawancara');
    }

    public function create()
    {
    	$questions = Question::all();
        $user = User::where("id", "=", Auth::user()->id)->get();
    	return view('tambahwawancara', compact('questions'));
    }

    public function showTable()
 	  {
 	 	$posts = Post::paginate(10);
 	 	$posts->links();

 		return view('revisi', compact('posts'));
 	  }

    public function selesai()
    {
        $posts = Post::paginate(10);
        $posts->links();
        
        return view('selesai', compact('posts'));
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
