<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Student
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
        if(!Auth::guard('student')->check())
        {
            return redirect('student/index')->with('flash','You need to enter your login credential first');
        }
        return $next($request);
        
    }
}
