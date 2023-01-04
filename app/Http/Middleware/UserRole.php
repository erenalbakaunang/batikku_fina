<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class UserRole
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
        $userModel = $request->user();

        if($userModel) {
            $is_pegawai = ($userModel->isPegawai()) ?: false;
        
            if($request->routeIs('pegawai.*') && !$is_pegawai) {
                return redirect('/');
            } elseif ($request->is('/') && $is_pegawai) {
                return redirect('/pegawai');
            } 
        }
        
        return $next($request);
    }
}
