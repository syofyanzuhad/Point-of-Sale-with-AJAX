<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth as Auth;
use Closure;

class CekUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $level)
    {
        $user = Auth::user();
        // dd($user);
        if($user && $user->level != $level){
            return redirect('/');
        }
        else return $next($request);
    }
}
