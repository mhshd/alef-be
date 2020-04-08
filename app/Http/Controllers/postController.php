<?php

namespace App\Http\Controllers;

use App\posts;
use Illuminate\Http\Request;
use Carbon\Carbon;

class postController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['home','show']]);
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
        $date = \Morilog\Jalali\Jalalian::forge('now')->format('%d %B ، %Y');
        $post->createdDate = $date;
        $post->updatedDate = $date;
        $post->timestamps = false;
        $post->save();

        return redirect('posts');

    }
    public function update(Request $request){
        $id = $request->typeChoice;
        $post =  posts::query()->where('id', '=', $id)
            ->update(array('title' => $request->get('title'), 'body'=>$request->get('body')));
        $date = \Morilog\Jalali\Jalalian::forge('now')->format('%d %B ، %Y');
        $post->updatedDate = $date;
        $post->save(['timestamps' => FALSE]);

        return redirect('posts');

    }

    public function show($id)
    {
        $post = posts::query()->find($id);
        //increase post's view and save it to db
        $view = $post->views;
        $post->views = $view+1;
        $post->save();

        return view('show', compact('post'));
    }


    public function delete($id)
    {
        $post = posts::query()->find($id);
        $post->delete();
        $posts = posts::all();

        return view('home', compact('posts'));
    }
    public function edit($id)
    {
        $post = posts::query()->find($id);

        return view('edit', compact('post'));
    }

    public function search()
    {

        $key = request('keyword');
        $posts = posts::query()->where('title','LIKE','%'.$key.'%')->orWhere('body','LIKE','%'.$key.'%')->latest()->get();

        return view('home',compact('posts'));

    }

    public function critic()
    {
        $posts = posts::all()->where('type','=',0);

        return view('home', compact('posts'));
    }
    public function introduce()
    {
        $posts = posts::all()->where('type','=',1);
        return view('home', compact('posts'));
    }

    public function drafts()
    {
        $posts = posts::all()->where('type','=',2);
        return view('home', compact('posts'));
    }
    public function teach()
    {
        $posts = posts::all()->where('type','=',3);

        return view('home', compact('posts'));
    }
}

