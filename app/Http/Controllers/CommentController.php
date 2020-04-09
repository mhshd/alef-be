<?php

namespace App\Http\Controllers;

use App\comment;
use App\posts;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $comment = new comment();
        //strip_tags helps to sanitize the input string from html tags, so it prevents XSS attacks
        $comment->body = strip_tags($request->get('comment_body'));
        //$comment->user()->associate($request->user());
        $date = \Morilog\Jalali\Jalalian::forge('now')->format('%d %B ، %Y');
        $comment->comment_Date = $date;
        $post_id = $request->get('post_id');
        $post = posts::query()->find($post_id);
        $comment->timestamps = false;
        $post->comments()->save($comment);
        return back();
    }
    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = strip_tags($request->get('comment_body'));
        /*$reply->user()->associate($request->user());*/
        $reply->parent_id = $request->get('comment_id');
        $post = posts::find($request->get('post_id'));
        $date = \Morilog\Jalali\Jalalian::forge('now')->format('%d %B ، %Y');
        $reply->comment_Date = $date;
        $reply->timestamps = false;
        $post->comments()->save($reply);

        return back();

    }
}
