<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ... $roles): Response
    {
        // $user = $request->user(); //mengambil data user yang login
        // if($user->hasRole($role)) {
        //     return $next($request);
        // }
        // //jika tidak punya role, maka tampilkan error 403
        // abort(403, 'Forbidden. Kamu tidak punya akses ke halaman ini');

        $user_role = $request->user()->getRole(); // ambil data level_kode dari user yang login
        if(in_array($user_role, $roles)) {
            return $next($request);
        }
        //jika tidak punya role, maka tampilkan error 403
        abort(403, 'Forbidden. Kamu tidak punya akses ke halaman ini');
    }
}