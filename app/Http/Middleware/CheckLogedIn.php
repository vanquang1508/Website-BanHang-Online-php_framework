<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogedIn
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
            if ($user->level == 0){
                return $next($request);
            }else{
                return redirect()->intended('login')->with('thongbao','Tài khoản không có quyền');
            }
        }else{
            return redirect()->intended('login');
        }

    }
}
