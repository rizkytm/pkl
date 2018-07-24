<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class WawancaraController extends Controller
{
    public function index()
    {
    	return view('wawancara');
    }

    public function create()
    {
    	return view('tambahwawancara');
    }

    public function showTable()
 	  {
 	 	$posts = Post::paginate(10);
 	 	$posts->links();

 		return view('revisi', compact('posts'));
 	  }

    public function selesai()
    {
      return view('selesai');
    }



}
