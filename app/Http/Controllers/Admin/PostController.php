<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function test()
    {
        //Lấy toàn bộ dữ liệu
        $posts = Post::all();
        //Lấy dữ liệu theo số lượng
        $posts = Post::query()
            ->latest('id')
            ->limit(10)
            ->get();
        //Điều kiện
        $posts = Post::query()
            ->where('category_id', 1)
            ->get();

        return $posts;
    }

    public function index()
    {
        //Phân trang
        $posts = Post::query()->latest('id')->paginate(8);

        return view('admin.posts.index', compact('posts'));
    }

    //Hiển thị form create
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }
    //Xử lý tạo bài viết
    public function store(Request $request)
    {
        $data = $request->except('image');
        //khi chua co hinh anh
        $path = "";
        // khi co hinh anh
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
        }
        //duong dan hinh anh vao database
        $data['image'] = $path;
        //Insert data
        Post::query()->create($data);
        return redirect()->route('admin.posts.index')->with('message', 'them thanh cong');
    }

    //xoa du lieu
    public function destroy(Post $post){
        //xoa anh
        Storage::delete($post->image);
        //xoa du lieu
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', 'xoa thanh cong');
    }
    //hien thi form edit
    public function edit(Post $post){
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }
    //luu du lieu
    public function update(Request $request, Post $post){
        $data = $request->except('image');
        //khi chua co hinh anh
        $path = "";
        // khi co hinh anh
        if ($request->hasFile('image')) {
            //xoa anh cu
            Storage::delete($post->image);
            //luu anh moi
            $path = $request->file('image')->store('images');
            //duong dan hinh anh vao database
            $data['image'] = $path;
        }

        //Insert data
        $post->update($data);
        return redirect()->route('admin.posts.index')->with('message', 'sua thanh cong');
    }
    //hien thi du lieu da xoa
    public function listPostTrash(){
        $posts = Post::onlyTrashed()->paginate(8);
        return view('admin.posts.trash', compact('posts'));
    }
    // khoi phuc du lieu da xoa
    public function restore($id){
        Post::withTrashed()->where('id', $id)->restore();
        return redirect()->route('admin.posts.trashed')->with('message', 'khoi phuc thanh cong');
    }
    //Tim kiem
    public function search(Request $request)
{
    $query = $request->input('query');
    $posts = Post::where('title', 'like', '%' . $query . '%')->paginate(8);
    return view('admin.posts.index', compact('posts', 'query'));
}
    //xem chi tiet
    public function detail($id)
{
    $post = Post::with(['category', 'comments.user'])->findOrFail($id);

    $relatedPosts = Post::where('category_id', $post->category_id)
        ->where('id', '!=', $post->id)
        ->limit(4)
        ->get();

    $featuredPosts = Post::orderBy('view', 'desc')
        ->limit(5)
        ->get();

    return view('detail', compact('post', 'relatedPosts', 'featuredPosts'));
}


//thong ke view
public function mostViewed()
{
    $mostViewedPosts = Post::orderBy('view', 'desc')
                           ->limit(5)
                           ->get();

    return view('admin.posts.most-viewed', compact('mostViewedPosts'));
}

//comment
public function showWithComments(Post $post)
{
    $post->load('comments.user');
    return view('posts.show-with-comments', compact('post'));
}
//category
public function indexCategory()
{
    $categories = Category::all();
    return view('admin.posts.category', compact('categories'));
}

public function createCategory()
{
    return view('admin.posts.create-cate');
}

public function storeCategory(Request $request)
{
    $validatedData = $request->validate(['name' => 'required|string|max:255']);
    Category::create($validatedData);
    return redirect()->route('admin.categories.index')->with('message', 'Category created successfully');
}

public function editCategory(Category $category)
{
    return view('admin.posts.edit-cate', compact('category'));
}

public function updateCategory(Request $request, Category $category)
{
    $validatedData = $request->validate(['name' => 'required|string|max:255']);
    $category->update($validatedData);
    return redirect()->route('admin.categories.index')->with('message', 'Category updated successfully');
}

public function destroyCategory(Category $category)
{
    $category->delete();
    return redirect()->route('admin.categories.index')->with('message', 'Category deleted successfully');
}
//dashboard
public function dashboard()
{
    $totalPosts = Post::count();
    $totalViews = Post::sum('view');
    $categoriesWithPostCount = Category::withCount('posts')->get();
    return view('admin.posts.dashboard', compact('totalPosts', 'totalViews', 'categoriesWithPostCount'));
}


}
