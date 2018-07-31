<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Post;
use App\User;
use Auth;
use App\Category;
use App\Answer;

class WawancaraController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);
        $categories->links();

        return view('wawancara', compact('categories'));
    }

    public function storeWawancara(Request $request)
    {
        Post::create([
            'user_id' => auth()->id(),
            'narasumber' => request('narasumber'),
            'topic' => request('topic'),
            'category_id' => request('kategori_id')
        ]);

        return redirect()->route('jawab.pertanyaan');
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
        $input = $request->all();
        foreach($request->input('answers') as $key => $value) {
        Answer::Create(array(
        'answer' => $value,
        'post_id' => $input['post_id'],
        'question_id' => $input['qid'][$key],
    ));
}
    return redirect()->back();
    }

}