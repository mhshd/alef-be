<?php

namespace App\Http\Controllers;

use App\posts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
    public function create()
    {
        return view('post');
    }
    
    //this function sores posts in db
    public function store(Request $request)
    {
        $post =  new posts;
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->type= $request->typeChoice;
        $date = \Morilog\Jalali\Jalalian::forge('now')->format('%d %B %Y');
        $post->createdDate = $date;
        $post->updatedDate = $date;
        $post->timestamps = false;
        $post->save();

        return redirect('posts');

    }
    
    //this function take the edition version of the posts and save it to db
    public function update(Request $request){
        $id = $request->typeChoice;
        $date = \Morilog\Jalali\Jalalian::forge('now')->format('%d %B ، %Y');
        DB::table('posts')
            ->where('id', $id)->update(array(
                'title' => $request->get('title'),
                'body'=>$request->get('body') ,
                'updatedDate'=> $date)
            );


        return redirect('posts');

    }
    
    //this function returns a specified post which client decided to view
    public function show($id)
    {
        $post = posts::query()->find($id);
        //increase post's view and save it to db
        $post->views = $post->views +1;
        $post->timestamps = false;
        $post->save();

        return view('show', compact('post'));
    }
    
    //this function delete specified post by id
    public function delete($id)
    {
        posts::query()->where('id','=',$id)->delete();

        return redirect('posts');
    }
    
    //this function returns a form so the user can edit the posts
    public function edit($id)
    {
        $post = posts::query()->find($id);

        return view('edit', compact('post'));
    }

    public function search()
    {
        $key = request('keyword');
        $posts = posts::query()->where('title','LIKE','%'.$key.'%')->orWhere('body','LIKE','%'.$key.'%')->get();

        return view('showResults',compact('posts'));

    }

    public function critic()
    {
        $posts = posts::where('type','=',0)->paginate(5);

        return view('home', compact('posts'));
    }
    public function introduce()
    {
        $posts = posts::where('type','=',1)->paginate(5);
        return view('home', compact('posts'));
    }

    public function drafts()
    {
        $posts = posts::where('type','=',2)->paginate(5);
        return view('home', compact('posts'));
    }
    public function teach()
    {
        $posts = posts::where('type','=',3)->paginate(5);

        return view('home', compact('posts'));
    }
    
    //this functin shows posts by number of views which client acceessed by footer
    public function mostViewd()
    {
        $posts = posts::OrderBy('views', 'DESC')->paginate(5);
        return view('home', compact('posts'));
    }
}

