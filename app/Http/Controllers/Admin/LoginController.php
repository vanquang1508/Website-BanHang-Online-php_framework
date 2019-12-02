<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function getLogin(){
        return view('Admin.Login.index');
    }
    public function postLogin(Request $request){
        $arr = ['email'=>$request->email, 'password'=>$request->password];
        if (Auth::attempt($arr,true)){
            return  redirect("admin/home")->with('thongbao','Đăng nhập thành công');
        }else{
            return back()->with('thongbao','Tài khoản hoặc mật khẩu chưa đúng');
        }
    }
}
