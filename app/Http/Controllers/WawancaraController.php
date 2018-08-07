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
        $posts = Post::paginate(10);
        $categories = Category::paginate(10);
        $categories->links();

        return view('wawancara', compact('categories', 'posts'));
    }

    public function show($id)
    {
        $posts = Post::find($id);
        $cid = $posts->category_id;
        $pid = $posts->id;
        $categories = Category::where("id", $cid)->first();

        $questions = Question::where("category_id", $cid)->get();
        $answers = Answer::where("post_id", $pid)->get();

        $posting = Post::with('narasumber')->get();

        return view('tampil', compact('posts', 'categories', 'narasumber', 'users', 'questions', 'answers', 'posting'));
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
        // $post = Post::find($id);

        // $post->update([
        //     'topic' => request('topik'),
        // ]);


        

        $input = $request->all();
        foreach($request->input('answers') as $key => $value) {
            // if($request->has('answers'))
            // {
                $jawaban = Answer::updateOrCreate([
                    'answer' => $value,
                    'post_id' => $input['post_id'],
                    'question_id' => $input['qid'][$key],
                ]);
            // }
                $jawaban->save();       
        }

        return redirect()->route('revisi');
    }


    public function storeWawancara(Request $request)
    {
        $request->validate([
            'kontak' => 'numeric',
        ]);

        $post = Post::create([
            'user_id' => auth()->id(),
            'penulis1' => request('penulis1'),
            'penulis2' => request('penulis2'),
            'lembaga' => request('lembaga'),
            'topic' => request('topic'),
            'category_id' => request('kategori_id')
        ]);
        
        $files = $request->file('files');

        if (is_array($files) || is_object($files))
        {
            foreach ($files as $file) {
                $filename = $file->store('files');
                File::create([
                    'post_id' => $post->id,
                    'filename' => $filename
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
            return redirect()->route('wawancara')->with('success', 'Wawancara Ditambahkan');
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
 	 	$posts = Post::with('narasumber')->where('condition', '2')->paginate(10);

 		return view('revisi', compact('posts'));
 	  }

    public function selesai()
    {
        //$posts = Post::paginate(10);
        $posts = Post::with('narasumber')->where('condition', '1')->paginate(10);
        
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
        return view('tambahkategori');
    }

    public function storekategori(Request $request)
    {
        Category::create([
            'name' => request('name')
        ]);
        return redirect()->back();
    }

    public function tambahpertanyaan()
    {
        $categories = Category::all();
        $countquestion = Question::where("id", "=", 1)->count() + 1;
        return view('tambahpertanyaan', compact('categories', 'countquestion'));
    }

    public function storepertanyaan(Request $request)
    {
        Question::create([
            'category_id' => request('category_id'),
            'nomor' => (Question::where('category_id', request('category_id'))->count() + 1),
            'question' => request('name')
        ]);
        return redirect()->back();
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
    return redirect()->back();
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

        return redirect()->back();
    }
}