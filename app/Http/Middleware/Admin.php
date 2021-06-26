<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Admin
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
        if(Auth::user()->isImpersonating())
        {
            return $next($request); 
        }   
      $role='1';
        $user = Auth::user();
        if($user->user_role == $role)
        {
            return $next($request);
        }
        return redirect('/login');
    }
}
