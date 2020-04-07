<?php

namespace App\Http\Controllers;

use App\posts;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create()
    {
        return view('post');
    }


    public function store(Request $request)
    {
        $post =  new posts;
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->type= $request->typeChoice;
        $post->save();

        return redirect('posts');

    }

// PostController.php

    public function show($id)
    {
        $post = posts::find($id);

        return view('show', compact('post'));
    }

    public function delete($id)
    {
        $post = posts::query()->find($id);
        $post->delete();
        $posts = posts::all();

        return view('home', compact('posts'));
    }

    public function search()
    {

        $key = request('keyword');
        $posts = posts::query()->where('title','LIKE','%'.$key.'%')->orWhere('body','LIKE','%'.$key.'%')->latest()->get();

        return view('showResults',compact('posts'));

    }

    public function critic()
    {
        $posts = posts::all()->where('type','=',0);

        return view('showResults', compact('posts'));
    }
    public function introduce()
    {
        $posts = posts::all()->where('type','=',1);
        return view('showResults', compact('posts'));
    }

    public function drafts()
    {
        $posts = posts::all()->where('type','=',2);
        return view('showResults', compact('posts'));
    }
}
