<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestedPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('user')->check()){
            return $next($request);
        }
        else{
            return redirect()->route('frontend.login.form')->with('success','you are not logged in. Please login');
        }
        return redirect()->back();
    }
}
