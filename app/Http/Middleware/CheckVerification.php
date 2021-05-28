<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckVerification
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

        if(Auth::guard('user')->user()->verification=='verified') {


        return $next($request);
    }
        else {
        return redirect()->back()->with('danger','For doing this action you must verify your account.Go Dashboard>Profile> press "Request User verification"!!!');
    }

    }
}
