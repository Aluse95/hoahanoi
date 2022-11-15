<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\ReplyComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required'
        ],[
            'name.required' => 'Tên không được trống',
            'content.required' => 'Tên không được trống',
            'email.required' => 'Email không được trống',
            'email.email' => 'Không đúng định dạng email',
        ]);
        // dd($request->all());
        $cmt = new Comment;
        $cmt->name = $request->input('name');
        $cmt->email = $request->input('email');
        $cmt->content = $request->input('content');
        $cmt->news_id = $request->input('news_id');
        $cmt->save();

        $id = Comment::max('id');
        $data = Comment::where('id', $id)->first();
        session()->put('name',$data->name);

        return $data;
    }

    public function reply(Request $request) {

        $validated = $request->validate([
            'content' => 'required'
        ]);
        // dd($request)->all();
        $reply = new ReplyComment;
        $reply->name = $request->input('name');
        $reply->content = $request->input('content');
        $reply->comment_id = $request->input('comment_id');
        $reply->save();

        $id = ReplyComment::max('id');
        $data = ReplyComment::where('id', $id)->first();

        return $data;
    }
}
