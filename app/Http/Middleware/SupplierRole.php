<?php

namespace App\Http\Middleware;

use Closure;
use App\SupplierMeeting;

class SupplierRole
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
        $token = SupplierMeeting::where('status','active')->pluck('token')->toarray();
        if (session()->has('supplier_auth')) {
            if (in_array(session()->get('supplier_auth'),$token)) {
                session()->put('supplier_auth',session()->get('supplier_auth'));
                return $next($request);
            }
            session()->forget('supplier_auth');
        }
        return redirect('required-token');
    }
}
