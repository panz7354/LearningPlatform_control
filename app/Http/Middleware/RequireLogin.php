<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequireLogin
{
    /**
     * 未登入（session 裡沒有 user_id）就導去登入頁，
     * 用在「程式實作」「互動測驗」的作答／送出答案路由上。
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session('user_id')) {
            return redirect()->route('login')
                ->with('error', '請先登入才能作答。');
        }

        return $next($request);
    }
}
