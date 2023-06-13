<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request){
        $comments = new Comment();
        $comments->user_id = Auth::user()->id;
        $comments->title = $request->subject;
        $comments->content = $request->commentdesc;
        $comments->status = "1";
        $comments->parent_id = "0";
        $comments->post_id = $request->id;
        $comments->rating = $request->rating;
        $comments->date = date('Y-m-d H:i:s');
        $comments->save();
        return redirect()->back()->with('message', 'Your comment successfully added!');
    }
    public function edit($id){
        $comment = Comment::find($id);
        return view('courses.editcomment', ["comment" => $comment]);
    }
    public function editSubmit(Request $request){
        $comment = Comment::where('id',$request->id)->update($request->except('id','_token', 'blogimage'));
        return redirect()->back()->with('message', 'Your comment successfully edited!');
    }
    public function reply(Request $request){
        $comments = new Comment();
        $comments->parent_id = $request->id;
        $comments->user_id = Auth::user()->id;
        $comments->title = $request->subject;
        $comments->content = $request->commentdesc;
        $comments->status = "1";
        $comments->post_id = $request->postid;
        $comments->rating = $request->rating;
        $comments->date = date('Y-m-d H:i:s');
        $comments->save();
        return redirect()->back()->with('message', 'Your reply to the comment is successfully added!');
    }
}
