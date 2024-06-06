<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$permission_akses): Response
    {
        $next = $next($request);
        
        if(!Auth::check()){
            
            return abort(403);
        }
        $user_permissions = Auth::user()->getPermissionsViaRoles();
        foreach($user_permissions as $key => $permission){
            $namePermission = strtolower($permission['name']);
            $namePermission = str_replace(" ",'',$permission);
            $permission_akses = strtolower($permission_akses);
            $permission_akses = str_replace(" ",'',$permission_akses);
            if($namePermission == $permission_akses){
                return $next;
            }
        }
        return $next;
    }
}
