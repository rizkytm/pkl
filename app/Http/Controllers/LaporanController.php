<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Post;
use App\Narasumber;

class LaporanController extends Controller
{
  public function masuk()
  {
      $posts = Post::with('narasumber')->where('condition', '1')->get();

      return view('lap_masuk', compact('posts'));
  }

  public function laprevisi()
  {

      return view('lap_revisi');
  }

  public function lapselesai()
  {

      return view('lap_selesai');
  }

  public function revisi($id)
    {
        $post = Post::find($id);
        $post->condition = 2;
        $post->save();

        return redirect()->back();
    }
}
