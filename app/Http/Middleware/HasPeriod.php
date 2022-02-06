<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasPeriod
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
        if(\App\Models\PeriodSetting::getActivePeriod()) {
            return $next($request);
        }

        if(Auth::user()->role === 'ADMIN') {
            return redirect('admin/periodSettings/create')->with('error', 'Periode tahun ajar belum diatur');
        }else {
            return redirect()->back()->with('error', 'Periode tahun ajar belum diatur');
        }
    }
}
