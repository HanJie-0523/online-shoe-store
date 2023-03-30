<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::user()->isAdmin()){
            return redirect(route('welcome'));
        }
        // else{
        //     return redirect(route('admin/products'));
        // }
        // if(!Auth::user()->isAdmin()){
        //     return redirect(route('admin/products'));
        // }else{
        //     return redirect(route('dashboard'));
        // }


        return $next($request);
    }
}
