<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class LoginController extends Controller
{
    //show login
    public function showLogin()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect(route('admin.home'));
            }
        }
        return view('backend.login.login');
    }

    // dashboard
    public function showHome()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            $data = Order::orderBy('created_at', "DESC")->take(5)->get();
            return view('backend.home.index', compact('data'));
        }
        return view('backend.login.login');
    }

    // login
    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($credential)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                $request->session()->regenerate();
                return redirect(route('admin.home'));
            } else {
                return back()->with('message', 'Bạn không có quyền truy cập trang quản lí !!!');
            }
        }

        return back()->with('message', 'Sai tên đăng nhập hoặc mật khẩu');
    }
    //logout
    public function logout()
    {
        Auth()->logout();
        return view('backend.login.login');
    }
}
