<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    //Hiển thị trang chủ
    public function home()
{
    $latestPosts = DB::table('posts')
        ->join('categories', 'posts.category_id', '=', 'categories.id')
        ->select('posts.*', 'categories.name as category_name')
        ->orderByDesc('posts.created_at')
        ->limit(5)
        ->get();

    $mostViewedPosts = DB::table('posts')
        ->join('categories', 'posts.category_id', '=', 'categories.id')
        ->select('posts.*', 'categories.name as category_name')
        ->orderByDesc('posts.view')
        ->limit(5)
        ->get();

    $featuredPosts = DB::table('posts')
        ->join('categories', 'posts.category_id', '=', 'categories.id')
        ->select('posts.*', 'categories.name as category_name')
        ->orderByDesc('posts.view')
        ->limit(5)
        ->get();

        $user = Auth::user();
        return view('home', compact('latestPosts', 'mostViewedPosts', 'featuredPosts', 'user'));
}




    //Hiển thị danh sách bài viết theo danh mục
    public function list($id)
    {
        $posts = DB::table('posts')
            ->where('category_id', $id)
            ->get();

        return view('list-post', compact(var_name: 'posts'));
    }

    //Hiển thị chi tiết bài viết
    public function detail($id)
{
    $post = Post::with('comments.user', 'category')->findOrFail($id);

    $relatedPosts = Post::where('category_id', $post->category_id)
        ->where('id', '!=', $post->id)
        ->limit(4)
        ->get();

    $featuredPosts = Post::orderBy('view', 'desc')
        ->limit(5)
        ->get();

    return view('detail', compact('post', 'relatedPosts', 'featuredPosts'));
}


//Hiển thị trang tìm kiếm
public function search(Request $request)
{
    $query = $request->input('query');
    $posts = Post::where('title', 'like', '%' . $query . '%')->paginate(8);
    $featuredPosts = Post::orderBy('view', 'desc')->take(5)->get();

    return view('search-results', compact('posts', 'query', 'featuredPosts'));

}
//hiển thị comment
public function showWithComments($id)
{
    $post = Post::with('comments.user')->findOrFail($id);
    return view('posts.show-with-comments', compact('post'));
}


}
