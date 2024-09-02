<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
{
    if (Auth::check()) {

        $user = Auth::user();
        $roles = DB::table('roles')->pluck('name')->toArray();
        if ($user->hasAnyRole($roles)) {
            return $next($request);
        }
        return redirect(route('login'))->with('alertMessage', 'Unauthorized action.');

    }
    return redirect(route('login'))->with('alertMessage', 'Unauthorized action.');

}

}
