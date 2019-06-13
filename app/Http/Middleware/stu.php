<?php

namespace App\Http\Middleware;

use Closure;

class stu
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
        echo "这是前置中间件";
        $response=$next($request);

        return $response;
    }
}
