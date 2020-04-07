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
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $post_id = $request->get('post_id');
        $post = posts::query()->find($post_id);
        if (!is_object($post)) echo "Yeah, I really have a problem here...";
        $post->comments()->save($comment);
        return back();
    }
    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = posts::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();

    }
}
