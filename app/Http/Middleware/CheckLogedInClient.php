<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogedInClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check()){
            $user = Auth::user();
            if ($user->level == 1){
                return $next($request);
            }else{
                return redirect()->intended('dang-nhap')->with('thongbao','Tài khoản không có quyền');
            }
        }else{
            return redirect()->intended('dang-nhap');
        }
    }
}
