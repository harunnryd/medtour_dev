<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $has)
    {
        switch ($has) {
            case 'admin':
                $auth = Auth::guard('admin')->user();
                break;

            default:
                $auth = Auth::guard('web')->user();
                break;
        }

        if (!$auth->can($has. 'Access', $auth->role)) {
            return App::abort(403);
        } return $next($request);

    }
}
