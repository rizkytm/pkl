<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Post;
use App\User;
use Auth;
use App\Category;
use App\Answer;
use Validator;
use App\File;
use App\Narasumber;
use App\Comment;

class WawancaraController extends Controller
{
    // public function tampil()
    // {
    //     $posts = Post::orderBy("created_at", "desc")->first();
    //     $id = $posts->category_id;
    //     $pid = $posts->id;
    //     $categories = Category::where("id", $id)->first();

    //     $questions = Question::where("category_id", $id)->get();
    //     $answers = Answer::where("post_id", $pid)->get();

    //     return view('tampil', compact('posts', 'categories', 'users', 'questions', 'answers'));
    // }


    public function index()
    {
        $posts = Post::where("user_id", "=", Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::paginate(10);
        $categories->links();
        $users = User::where("id", "=", Auth::user()->id)->get();

        return view('wawancara', compact('categories', 'posts', 'users'));
    }

    public function show($id)
    {
        // $posts = Post::find($id);
        // $cid = $posts->category_id;
        // $pid = $posts->id;
        // $categories = Category::where("id", $cid)->first();

        // $questions = Question::where("category_id", $cid)->get();
        // $answers = Answer::where("post_id", $pid)->get();

        // $posting = Post::with('narasumber')->get();

        // return view('tampil', compact('posts', 'categories', 'narasumber', 'users', 'questions', 'answers', 'posting'));
        // 
        $posts = Post::find($id);
        $cid = $posts->category_id;
        $pid = $posts->id;
        $categories = Category::where("id", $cid)->first();

        $questions = Question::where("category_id", $cid)->get();
        $answers = Answer::where("post_id", $pid)->get();

        $posting = Post::with('narasumber')->where('condition', '1')->get();

        $postfile = File::where('post_id', $pid)->get();

        $comments = Comment::where("post_id", $pid)->get();

        return view('tampil', compact('posts', 'categories', 'narasumber', 'users', 'questions', 'answers', 'posting', 'postfile', 'comments'));
    }

    public function tampiluseredit($id)
    {
        $posts = Post::find($id);
        $cid = $posts->category_id;
        $pid = $posts->id;
        $categories = Category::where("id", $cid)->first();

        $questions = Question::where("category_id", $cid)->get();
        $answers = Answer::where("post_id", $pid)->get();

        $posting = Post::with('narasumber')->get();

        $comments = Comment::where("post_id", $pid)->get();

        return view('tampiluser', compact('posts', 'categories', 'narasumber', 'users', 'questions', 'answers', 'posting', 'comments'));
    }

    public function tampiluserupdate($id, Request $request)
    {
        $post = Post::find($id);
        $pid = $post->id;

        // $post->update([
        //     'topic' => request('topik'),
        // ]);
        // $input = $request->all();
        // foreach($request->input('answers') as $key => $value) {

        //     $aid = $request->input('aid');

        //     //     $tanya = Answer::where('question_id', $request->input('qid'))->get();
        //         $jawaban = Answer::where('id', $pid)->update(array(
        //             'answer' => $value[$key],
        //         ));
        //         // $jawaban->save();
        // }

        $answers = $request->input('answers');
        $qids = $request->input('qid');
        foreach($answers as $key => $value)
        {
            $answer = Answer::where('question_id', $request->input('qid.'.$key))->update(array(
                'answer' => $request->input('answers.'.$key)
            ));
            // $answer->answer = $request->input('answers.'.$key);
            
        }

        return redirect()->back();
    }

    public function kirimlagi($id)
    {
        $post = Post::find($id);
        $post->condition = 3;
        $post->save();

        return redirect()->route('revisi');
    }


    public function storeWawancara(Request $request)
    {
        $request->validate([
            'kontak' => 'numeric',
        ]);

        $post = Post::create([
            'user_id' => auth()->id(),
            'penulis1' => Auth::user()->name,
            'penulis2' => request('penulis2'),
            'lembaga' => request('lembaga'),
            'topic' => request('topic'),
            'category_id' => request('kategori_id')
        ]);

        $files = $request->file('files');

        if (is_array($files) || is_object($files))
        {
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $file = $file->storeAs('videos', $filename);
                // $filename = $file->store('files');
                File::create([
                    'post_id' => $post->id,
                    'filename' => $file
                ]);
            }
        }

        $narasumber = Narasumber::create([
            'post_id' => $post->id,
            //'narasumber' => request('narasumber'),
            'nama' => request('nama'),
            'kontak' => request('kontak')
        ]);

        if($request->hasFile('files'))
        {
            return redirect()->route('wawancara')->with('success', 'Wawancara Berhasil Ditambahkan');
        }
        else
        {
            return redirect()->route('jawab.pertanyaan');
        }
    }

    public function create()
    {
    	$questions = Question::all();
        $user = User::where("id", "=", Auth::user()->id)->get();
    	return view('tambahwawancara', compact('questions'));
    }

    public function showTable()
 	  {
 	 	// $posts = Post::paginate(10);
 	 	$posts = Post::with('narasumber')->where('condition', '2')->where("user_id", "=", Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);

 		return view('revisi', compact('posts'));
 	  }

    public function selesai()
    {
        //$posts = Post::paginate(10);
        $posts = Post::with('narasumber')->where('condition', '4')->where("user_id", "=", Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);

        return view('selesai', compact('posts', 'narasumbers'));
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

    public function tambahkategori()
    {
        $categories = Category::all();
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

    public function rangkuman()
    {
        return view('rangkuman');
    }

    public function storekategori(Request $request)
    {
        Category::create([
            'name' => request('name')
        ]);
        return redirect()->route('tambah.kategori')->with('success', 'Kategori Berhasil Ditambahkan');
    }

    public function tambahpertanyaan()
    {
        $categories = Category::all();
        $countquestion = Question::where("id", "=", 1)->count() + 1;
        $questions = Question::with('category')->orderBy('category_id', 'asc')->get();
        return view('tambahpertanyaan', compact('categories', 'countquestion', 'questions'));
    }

    public function updatepertanyaan($id, Request $request)
    {
        $questions = Question::find($id);
        $questions->question = $request->input('pertanyaan');
        $questions->save();

        return redirect()->route('tambah.pertanyaan')->with('success', 'Pertanyaan Berhasil Diedit');
    }

    public function pertanyaandestroy($id)
    {
        $questions = Question::find($id);
        $questions->delete();

        return redirect()->route('tambah.pertanyaan')->with('danger', 'Pertanyaan Berhasil Dihapus');
    }

    public function storepertanyaan(Request $request)
    {
        Question::create([
            'category_id' => request('category_id'),
            'nomor' => (Question::where('category_id', request('category_id'))->count() + 1),
            'question' => request('name')
        ]);
        return redirect()->route('tambah.pertanyaan')->with('success', 'Pertanyaan Berhasil Ditambahkan');
    }

    public function jawabpertanyaan()
    {
        $posts = Post::orderBy('created_at', 'desc')->first();
        $id = $posts->category_id;
        $questions = Question::where('category_id', $id)->get();
        return view('jawabpertanyaan', compact('questions', 'posts'));
    }

    public function storejawaban(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'answers' => 'nullable',
        ]);

        $errors = $validator->errors();

        $input = $request->all();
        foreach($request->input('answers') as $key => $value) {
            if($request->has('answers'))
            {
                Answer::Create(array(
                    'answer' => $value,
                    'post_id' => $input['post_id'],
                    'question_id' => $input['qid'][$key],
                ));
            }
        }

      return redirect()->route('wawancara')->with('success', 'Wawancara Berhasil Ditambahkan');

    }

    public function new()
    {
        return view('newjawabpertanyaan');
    }

    public function kirim($id)
    {
        $post = Post::find($id);
        $post->condition = 1;
        $post->save();

        return redirect()->route('wawancara')->with('info', 'Wawancara Telah Dikirim');

    }

    public function manageuser()
    {
        $users = User::all();

        return view('manageuser', compact('users'));
    }

    public function manageuserdestroy($id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect()->route('manage.user')->with('danger', 'User Berhasil Dihapus');
    }
}
