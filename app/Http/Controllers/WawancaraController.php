<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use App\Post;

class WawancaraController extends Controller
{
    public function index()
    {
    	return view('wawancara');
    }

    public function create()
    {
    	$questions = Questions::all();
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
