<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleActive
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
        if (!Auth::guest()) {
            if (Auth::user()->status=='inactive') {
                abort(403,'ผู้ใช้งานไม่ได้รับสิทธิ์เข้าถึง');
            }
        }
        return $next($request);
    }
}
