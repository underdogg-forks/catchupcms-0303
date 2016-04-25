<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class MustHaveRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        if (Auth::check() && Auth::user()->hasRole($role)) {
            return $next($request);
        }

        flashMessage('You do not have permission to perform this action!', 'danger', true);
        return redirect('/');

    }
}
