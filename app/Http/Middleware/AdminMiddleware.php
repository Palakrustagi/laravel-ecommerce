<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class AdminMiddleware
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
        if(Auth::user()->status=='admin')
        {
           return $next($request);
        }
        else
        {
           return redirect('/home')->with('status','You are not an Admin!');
        }
        if(Auth::check())
        {
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online' . Auth::user()->id,true,$expiresAt);
        }
    }
}
