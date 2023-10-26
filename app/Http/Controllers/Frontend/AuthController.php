<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Auth\AuthInterface;
use App\Repositories\Order\OrderInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthController extends Controller
{
    private $orderRepository;
    public function __construct(OrderInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function loginUser(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'email.required'=>'Thông tin tài khoản không chính xác',
            'email.email' => 'Thông tin tài khoản không chính xác',
        ]);
        // dd($request->all());
        if (Auth::attempt($credential)) {
            $user = Auth::user();
            if ($user->role === 'user' || $user->role === 'admin') { // Kiểm tra role của user
                $request->session()->regenerate();
                return redirect(route('home'));
            } else {
                return back()->with('message','Sai tên đăng nhập hoặc mật khẩu');
            }
        }
        return back()->with('message', 'Sai tên đăng nhập hoặc mật khẩu');
        // return response()->json(['message' => 'Sai tên đăng nhập hoặc mật khẩu'], 500);
    }

    public function logout(){
        Auth()->logout();
        return redirect(route('home'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ], [
            'name.required' => 'Vui lòng nhập đầy đủ họ và tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng email',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->role = 'user';
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(['message' => 'Đăng kí thành công']);
    }

    public function profile(){
        if (Auth::check()) {
            $user = Auth::user();
            $order_list =  $this->orderRepository->getOrderList($user->id);
            return view('frontend.profile.index', compact('user', 'order_list'));
        } 
        return redirect(route('home'));
    }

    public function profileAddress(){
        if (Auth::check()) {
            return view('frontend.profile.address');
        } 
        return redirect(route('home'));
    }


}
