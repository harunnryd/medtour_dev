<?php

namespace App\Http\Middleware;

use Closure;
use App;

class AccessRight
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  <1next></1next>
     * @return mixed
     */
    public function handle($request, Closure $next, $has)
    {
        $access = $request->user()->role->accessright;

        if (!$request->user()->can($has, $access)) {
            return App::abort(404);

        }   return $next($request);
    }
}
