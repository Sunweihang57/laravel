<?php

namespace App\Http\Middleware\Index;

use Closure;

class Login
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
        $name=session('user_name');
        if (empty($name)) {
            return redirect('index/login/login');
        }
        
        return $next($request);
    }
}
