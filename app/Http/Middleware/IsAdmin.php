<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if (auth()->user()->role == 'admin') {
            return $next($request);
        }elseif (auth()->user()->role == 'manager') {
//            return redirect()->route("home")->with("toast","Student Login Successful");
            return redirect('manager-home');  // member dashboard path
        }else{
            return redirect('home');
        }
    }
}
