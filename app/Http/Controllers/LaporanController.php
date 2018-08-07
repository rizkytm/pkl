<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Post;
use App\Narasumber;
use App\Category;
use App\Question;
use App\Answer;
use App\Comment;
use App\File;

class LaporanController extends Controller
{
  public function masuk()
  {
      $posts = Post::with('narasumber')->where('condition', '1')->get();

      return view('lap_masuk', compact('posts'));
  }

  public function laprevisi()
  {
      $posts = Post::with('narasumber')->where('condition', '4')->get();

      return view('lap_revisi', compact('posts'));
  }

  public function lapselesai()
  {
    $posts = Post::with('narasumber')->where('condition', '3')->get();

      return view('lap_selesai', compact('posts'));
  }

  public function revisi($id)
    {
        $post = Post::find($id);
        Comment::create([
          'post_id' => $post->id,
          'user_id' => auth()->id(),
          'message' => request('komentar'),
        ]);
        $post->condition = 2;
        $post->save();

        return redirect()->route('masuk');
    }

    public function selesai($id)
    {
        $post = Post::find($id);
        $post->condition = 3;
        $post->save();

        return redirect()->route('masuk');
    }

  public function show($id)
  {
        $posts = Post::find($id);
        $cid = $posts->category_id;
        $pid = $posts->id;
        $categories = Category::where("id", $cid)->first();

        $questions = Question::where("category_id", $cid)->get();
        $answers = Answer::where("post_id", $pid)->get();

        $posting = Post::with('narasumber')->where('condition', '1')->get();

        $postfile = File::where('post_id', $pid)->get();

        return view('tampiladmin', compact('posts', 'categories', 'narasumber', 'users', 'questions', 'answers', 'posting', 'postfile'));
  }

  public function download($id)
  {
    $posts = Post::find($id);
    $pid = $posts->id;
    $postfile = File::where('post_id', $pid)->first();
    $path = 'storage/'.$postfile->filename;
    return response()->download($path);
  }
}
