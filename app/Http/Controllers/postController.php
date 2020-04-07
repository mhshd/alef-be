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

        $post->save();

        return redirect('posts');

    }

// PostController.php

    public function show($id)
    {
        $post = posts::find($id);

        return view('show', compact('post'));
    }

}
