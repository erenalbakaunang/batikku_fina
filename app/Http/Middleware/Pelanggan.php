<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Pelanggan
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

            if($is_pegawai) {
                return redirect(route('pegawai.profile.index'));
            }
        }
        
        return $next($request);
    }
}
