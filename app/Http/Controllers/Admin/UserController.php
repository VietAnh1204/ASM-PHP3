<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function toggleActive(User $user)
{
    if (Auth::id() === $user->id && $user->role === 'admin') {
        return back()->with('error', 'Không thể vô hiệu hóa tài khoản admin của chính mình');
    }

    $user->active = !$user->active;
    $user->save();

    $message = $user->active ? 'Tài khoản đã được kích hoạt' : 'Tài khoản đã bị vô hiệu hóa';
    return back()->with('message', $message);
}

}
