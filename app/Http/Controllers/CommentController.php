<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function store(Request $request, Post $post)
{
    $request->validate([
        'content' => 'required|string'
    ]);

    $comment = $post->comments()->create([
        'content' => $request->content,
        'user_id' => auth()->id()
    ]);

    return redirect()->back()->with('success', 'Bình luận đã được thêm thành công');
}
public function index()
{
    $comments = Comment::with(['user', 'post'])->latest()->paginate(20);
    return view('admin.posts.comment', compact('comments'));
}
public function destroy(Comment $comment)
{
    $comment->delete();
    return redirect()->back()->with('success', 'Comment deleted successfully');
}



}
