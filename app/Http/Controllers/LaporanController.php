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
use App\Admin;

use App\Notifications\RevisiNotification;
use App\Notifications\SelesaiNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function masuk()
  {
      $posts = Post::with('narasumber')->where('condition', '1')->orderBy('created_at', 'desc')->paginate(10);

      return view('lap_masuk', compact('posts'));
  }

  public function laprevisi()
  {
      $posts = Post::with('narasumber')->where('condition', '3')->orderBy('created_at', 'desc')->paginate(10);

      return view('lap_revisi', compact('posts'));
  }

  public function lapselesai()
  {
    $posts = Post::with('narasumber')->where('condition', '4')->where(function($query){
      $query->where('deleteCondition','2')->orWhereNull('deleteCondition');
    })->orderBy('created_at', 'desc')->paginate(10);

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

        $user = User::where('id', $post->user_id)->first();

        Notification::send($user, new RevisiNotification($post));

        return redirect()->route('masuk')->with('info', "Revisi telah dikirim");
    }

    public function selesai($id)
    {
        $post = Post::find($id);
        $post->condition = 4;
        $post->save();

        $user = User::where('id', $post->user_id)->first();

        Notification::send($user, new SelesaiNotification($post));

        return redirect()->route('masuk')->with("success", "Laporan Sudah Selesai");
    }

  public function show($id)
  {
        Auth::user()->unreadNotifications()->update(['read_at' => now()]);

        $posts = Post::find($id);
        $cid = $posts->category_id;
        $pid = $posts->id;
        $categories = Category::where("id", $cid)->first();

        $questions = Question::where("category_id", $cid)->get();
        $answers = Answer::where("post_id", $pid)->get();

        $posting = Post::with('narasumber')->where('condition', '1')->get();

        $postfile = File::where('post_id', $pid)->get();

        $comments = Comment::where("post_id", $pid)->get();

        return view('tampiladmin', compact('posts', 'categories', 'narasumber', 'users', 'questions', 'answers', 'posting', 'postfile', 'comments'));
  }

   public function showSelesai($id)
  {
        Auth::user()->unreadNotifications()->update(['read_at' => now()]);

        $posts = Post::find($id);
        $cid = $posts->category_id;
        $pid = $posts->id;
        $categories = Category::where("id", $cid)->first();

        $questions = Question::where("category_id", $cid)->get();
        $answers = Answer::where("post_id", $pid)->get();

        $posting = Post::with('narasumber')->where('condition', '1')->get();

        $postfile = File::where('post_id', $pid)->get();

        $comments = Comment::where("post_id", $pid)->get();

        return view('preview_lap_selesai', compact('posts', 'categories', 'narasumber', 'users', 'questions', 'answers', 'posting', 'postfile', 'comments'));
  }



  public function download($id)
  {
    $posts = Post::find($id);
    $pid = $posts->id;
    $postfile = File::where('post_id', $pid)->first();
    $path = 'storage/'.$postfile->filename;
    return response()->download($path);
  }

  public function search(Request $request)
    {
        $query = $request->get('search');
        $hasil = Post::where('topic', 'LIKE', '%' . $query . '%')->orderBy('created_at', 'desc')->get();

        return view('adminsearch', compact('hasil', 'query'));
    }

  public function postdestroy($id)
    {
        $posts = Post::find($id);
        if($posts->deleteCondition==null){
          $posts->deleteCondition=1;
          $posts->save();
        }
        else{
          $posts->delete();
        }

        return redirect()->route('lapselesai')->with('danger', 'Post Berhasil Dihapus');
    }


  public function tambahkategori()
    {
        $categories = Category::paginate(5);
        return view('tambahkategori', compact('categories'));
    }

    public function updatekategori($id, Request $request)
    {
        $categories = Category::find($id);
        $categories->name = $request->input('kategori');
        $categories->save();

        return redirect()->route('tambah.kategori')->with('success', 'Kategori Berhasil Diedit');
    }

    public function categorydestroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();

        return redirect()->route('tambah.kategori')->with('danger', 'Kategori Berhasil Dihapus');
    }

  public function storekategori(Request $request)
    {
        Category::create([
            'name' => request('name')
        ]);
        return redirect()->route('tambah.kategori')->with('success', 'Kategori Berhasil Ditambahkan');
    }

    public function tambahpertanyaan($id)
    {
        $categories = Category::all();
        $categoryname = Category::find($id);
        $countquestion = Question::where("id", "=", 1)->count() + 1;
        // $questions = Question::with('category')->orderBy('category_id', 'asc')->get();
        $questions = Question::where('category_id', $id)->paginate(5);
        return view('tambahpertanyaan', compact('categories', 'countquestion', 'questions', 'categoryname'));
    }

    public function updatepertanyaan($id, Request $request)
    {
        $questions = Question::find($id);
        $questions->question = $request->input('pertanyaan');
        $questions->save();

        return redirect()->route('tambah.pertanyaan', $questions->category_id)->with('success', 'Pertanyaan Berhasil Diedit');
    }

    public function pertanyaandestroy($id)
    {
        $questions = Question::find($id);
        $questions->delete();

        return redirect()->route('tambah.pertanyaan', $questions->category_id)->with('danger', 'Pertanyaan Berhasil Dihapus');
    }

    public function storepertanyaan(Request $request)
    {
        $cid = Question::create([
            'category_id' => request('category_id'),
            'nomor' => (Question::where('category_id', request('category_id'))->count() + 1),
            'question' => request('name')
        ]);
        return redirect()->route('tambah.pertanyaan', $cid->category_id)->with('success', 'Pertanyaan Berhasil Ditambahkan');
    }

    public function manageuser()
    {
        $users = User::paginate(10);

        return view('manageuser', compact('users'));
    }

    public function manageuserdestroy($id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect()->route('manage.user')->with('danger', 'User Berhasil Dihapus');
    }

    public function userbaru()
    {
      return view('tambahuseradmin');
    }

    public function userbarustore(Request $request)
    {
      $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
      ]);

      User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
      ]);

      return redirect()->back()->with('success', 'Pengguna Berhasil Ditambahkan');
    }

    public function adminbarustore(Request $request)
    {
      $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
      ]);

      Admin::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
      ]);

      return redirect()->back()->with('success', 'Admin Berhasil Ditambahkan');
    }
}
