<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Danhmuc;
use App\Models\like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $data= [];
    public function login()
    {
        $this->data['title']='trang đăng nhập';
        $danhmuc=Danhmuc::all();
        $user_id=Auth()->id();
        $likeCount = like::where('user_id',$user_id)->count();
       $cartCount = Cart::where('user_id',$user_id)->count();
        return view('auth.login',$this->data,compact('danhmuc','likeCount','cartCount'));
    }
    public function postlogin()
    {
        request()->validate([
            'email'=>'required|exists:users',
            'password'=>'required',
        ]);
        $dataa=request()->only('email','password');
      if (Auth::attempt($dataa)) {
        return redirect()->route('index');
      }
  
         return redirect()->back();
    }
    public function signup()
    {
        $this->data['title']='trang đăng kí';
        $danhmuc=Danhmuc::all();
        $user_id=Auth()->id();
        return view('auth.signup',$this->data,compact('danhmuc'));
    } 
    public function postsignup(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'image' => 'required|mimes:jpg,jpeg,png,gif|max:10000',
        'phone' => 'required',
        'password' => 'required',
        'confirm_password' => 'required|same:password',
    ]);

    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->password = bcrypt($request->input('password'));

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        // Di chuyển tệp ảnh vào thư mục lưu trữ
        $image->move(public_path('image'), $imageName);
        // Gán tên tệp ảnh cho thuộc tính 'image' của biến $user
        $user->image = $imageName;
    }

    $user->save();

    return redirect()->route('login')->with('msgsuccess', 'đăng kí thành công');
}
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with('msgsuccess', 'đăng xuất thành công');
    }
}
