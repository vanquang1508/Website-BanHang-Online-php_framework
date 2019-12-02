<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function __construct()
    {
        $dataCategory = Category::all();
        $dataBrand = Brand::all();
        view()->share(compact('dataCategory','dataBrand'));
    }
    public function getLogin(){
        return view('Client.Login.index');
    }
    public function postLogin(Request $request){
        $arr = ['email'=>$request->email, 'password'=>$request->password];
        if (Auth::attempt($arr,true)){
            return  redirect("home")->with('thongbao','Đăng nhập thành công');
        }else{
            return back()->with('thongbao','Tài khoản hoặc mật khẩu chưa đúng');
        }
    }
    public function getLogout(){
        Auth::logout();
        return  redirect()->intended('home');
    }
}
