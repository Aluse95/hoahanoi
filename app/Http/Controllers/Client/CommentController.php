<?php

namespace App\Http\Controllers\Client;

use App\Models\Comment;
use App\Models\ReplyComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function add(Request $request) {

        $validated = $request->validate([
            'content' => 'required'
        ],[
            'required' => 'Vui lòng nhập trường này'
        ]);
       
        $cmt = new Comment;
        $cmt->user_id = Auth::user()->id;
        $cmt->content = $request->input('content');
        $cmt->news_id = $request->input('news_id');
        $cmt->save();

        $id = Comment::max('id');
        $data = Comment::where('id', $id)->first();
        return $data;
    }

    public function reply(Request $request) {

        $validated = $request->validate([
            'content' => 'required'
        ]);

        $reply = new ReplyComment;
        $reply->user_id = Auth::user()->id;
        $reply->content = $request->input('content');
        $reply->comment_id = $request->input('comment_id');
        $reply->save();

        $id = ReplyComment::max('id');
        $data = ReplyComment::where('id', $id)->first();

        return $data;
    }
}
