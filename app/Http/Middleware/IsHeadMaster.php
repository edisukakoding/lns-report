<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsHeadMaster
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if(in_array(Auth::user()->role, [User::HEADMASTER, User::ADMIN], true)) {
            return $next($request);
        }

        return abort(403);
    }
}
