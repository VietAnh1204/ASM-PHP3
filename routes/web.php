<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('greeting', function () {
//     return "Hello Laravel";
// });
// Route::get('test', [TestController::class, 'index']);

// Route::view('home', 'home');

// //Thêm tham số vào URI
// Route::get('user/{id}', function ($id) {
//     return "USER ID: $id";
// });
// Route::get('user/{id}/comment/{comment_id}', function ($id, $comment_id) {
//     return "User ID: $id có Comment: $comment_id";
// });

// //Chỉ định cho tham số loại dữ liệu mong muốn (sử dụng regular expression)
// Route::get('product/{id}', function ($id) {
//     return "PRODUCT ID: $id";
// })->where('id', '[0-9]+');

// Route::get('product/{id}/user/{name}', function ($id, $name) {
//     return "Product id: $id được tạo bởi $name";
// })->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

// //Đặt tên cho đường dẫn
// Route::get('admin12312', function () {
//     return "Đây là trang dashboard";
// })->name('dashboard');

// //Query builder
// Route::get('posts', function () {
//     //Lấy tất cả dữ liệu của bảng posts
//     // $posts = DB::table('posts')->get();

//     //Lấy dữ liệu của các cột được chỉ định
//     $posts = DB::table('posts')
//         ->select('title', 'description')
//         ->get();

//     //Lấy dữ liệu theo điều kiện =
//     $posts = DB::table('posts')
//         ->where('title', 'A distinctio quibusdam eos.')
//         ->get();
//     //Lấy dữ liệu theo điều kiện LIKE
//     $posts = DB::table('posts')
//         ->where('title', 'LIKE', '%rem%')
//         ->get();

//     //Nối nhiều bảng
//     $posts = DB::table('posts')
//         ->join('categories', 'categories.id', 'posts.category_id')
//         ->get();

//     return $posts;
// });

// Route::get('post/{id}', function ($id) {
//     //Lấy 1 bản ghi theo id
//     $post = DB::table('posts')
//         ->where('id', $id)
//         ->first();

//     if ($post)
//         return $post;
//     return "Không có dữ liệu bài viết có ID=$id";
// });

Route::get('/', [PostController::class, 'home'])->name('page.home');
Route::get('/detail/{id}', [PostController::class, 'detail'])->name('page.detail');
Route::get('/category/{id}', [PostController::class, 'list'])->name('page.list');
Route::get('/search', [PostController::class, 'search'])->name('client.search');

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::delete('/admin/comments/{comment}', [CommentController::class, 'destroy'])->name('admin.comments.destroy');


//Admin
Route::middleware([Authenticate::class, CheckAuth::class])->group(function () {
    Route::prefix('admin')->group(function () {
        // Route::get('posts', [AdminPostController::class, 'test']);
        Route::get('/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');

        Route::get('/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
        Route::post('/posts/create', [AdminPostController::class, 'store'])->name('admin.posts.store');
        Route::get('/posts/detail/{post}', [AdminPostController::class, 'detail'])->name('admin.posts.detail');
        Route::get('/posts/edit/{post}', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
        Route::put('/posts/edit/{post}', [AdminPostController::class, 'update'])->name('admin.posts.update');

        Route::delete('/posts/delete/{post}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
        Route::get('/posts/trashed', [AdminPostController::class, 'listPostTrash'])->name('admin.posts.trashed');
        Route::get('/posts/restore/{post}', [AdminPostController::class, 'restore'])->name('admin.posts.restore');
        //Tìm kiếm
        Route::get('/posts/search', [AdminPostController::class, 'search'])->name('admin.posts.search');
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::patch('/admin/users/{user}/toggle-active', [UserController::class, 'toggleActive'])->name('admin.users.toggle-active');
        //thong ke
        Route::get('/admin/posts/most-viewed', [AdminPostController::class, 'mostViewed'])->name('admin.posts.most-viewed');
        //comment
        Route::get('/admin/comments', [CommentController::class, 'index'])->name('admin.comments.index');
        //category
        Route::get('/admin/categories', [AdminPostController::class, 'indexCategory'])->name('admin.categories.index');
        Route::get('/admin/categories/create', [AdminPostController::class, 'createCategory'])->name('admin.categories.create');
        Route::post('/admin/categories', [AdminPostController::class, 'storeCategory'])->name('admin.categories.store');
        Route::get('/admin/categories/{category}/edit', [AdminPostController::class, 'editCategory'])->name('admin.categories.edit');
        Route::put('/admin/categories/{category}', [AdminPostController::class, 'updateCategory'])->name('admin.categories.update');
        Route::delete('/admin/categories/{category}', [AdminPostController::class, 'destroyCategory'])->name('admin.categories.destroy');
        //dashboard
        Route::get('/posts/dashboard', [AdminPostController::class, 'dashboard'])->name('admin.posts.dashboard');

    });
});

//Login, register, logout
Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::get('/register', [AuthController::class, 'getRegister'])->name('Register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//profile
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

//Đổi mật khẩu
Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('password.update');

//đăng nhập client
Route::post('/client-login', [AuthController::class, 'clientLogin'])->name('client.login');
