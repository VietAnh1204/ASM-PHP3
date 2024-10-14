<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    //Login
    public function getLogin()
    {
        return view('login');
    }
    public function postLogin(Request $request)
{
    $credentials = $request->only(['email', 'password']);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        if (!$user->active) {
            Auth::logout();
            return redirect()->back()->with('error', 'Tài khoản của bạn đã bị vô hiệu hóa');
        }
        return redirect()->route('page.home');
    } else {
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng');
    }
}


    //Register
    public function getRegister()
    {
        return view('register');
    }
    public function postRegister(Request $request)
    {
        $data = $request->validate([
            'fullname' => ['required', 'min:6'],
            'username' => ['required', 'min:6', 'unique:users'],
            'email' => ['required'],
            'password' => ['required', 'min:6'],
            'address' => ['required', 'min:6'],
            'confirm_password' => ['required', 'same:password'],
        ]);
        User::query()->create($data);
        return redirect()->route('login')->with('message', 'Đăng ký thành công');
    }

    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.posts.index');
    }

    //profile
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
{
    $user = Auth::user();

    // Validate các trường khác và avatar
    $data = $request->validate([
        'fullname' => ['required', 'min:6'],
        'username' => ['required', 'min:6', 'unique:users,username,' . $user->id],
        'email' => ['required', 'email', 'unique:users,email,' . $user->id],
        'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'], // Validate avatar (file ảnh)
    ]);

    // Kiểm tra nếu có file avatar được upload
    if ($request->hasFile('avatar')) {
        // Xóa avatar cũ nếu có (nếu bạn muốn xóa file cũ trước khi upload file mới)
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        // Lưu avatar mới
        $avatar = $request->file('avatar')->store('avatars', 'public');
        $data['avatar'] = $avatar;
    }

    // Cập nhật thông tin người dùng
    $user->update($data);

    // Chuyển hướng lại trang profile với thông báo thành công
    return redirect()->route('profile')->with('message', 'Thông tin đã được cập nhật thành công');
}



    //change password
    public function showChangePasswordForm()
{
    return view('change-password');
}

public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => ['required', 'string'],
        'new_password' => ['required', 'string', 'min:8', 'confirmed', 'different:current_password'],
        'new_password_confirmation' => ['required', 'string'],
    ], [
        'current_password.required' => 'Mật khẩu hiện tại không được bỏ trống',
        'new_password.required' => 'Mật khẩu mới không được bỏ trống',
        'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự',
        'new_password.confirmed' => 'Xác nhận mật khẩu mới không khớp',
        'new_password.different' => 'Mật khẩu mới phải khác mật khẩu hiện tại',
        'new_password_confirmation.required' => 'Xác nhận mật khẩu mới không được bỏ trống',
    ]);

    $user = Auth::user();

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng']);
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->route('profile')->with('message', 'Đổi mật khẩu thành công');
}

//clientLogin
public function clientLogin(Request $request)
{
    $credentials = $request->only(['email', 'password']);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        if (!$user->active) {
            Auth::logout();
            return redirect()->back()->with('error', 'Tài khoản của bạn đã bị vô hiệu hóa');
        }
        return redirect()->route('page.home');
    } else {
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng');
    }
}

}
