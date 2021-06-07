<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class checkAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public $roles = [
        User::ROLE_ADMIN => User::ROLE_ADMIN,
        User::ROLE_ROOT => User::ROLE_ROOT
    ];

    public function handle($request, Closure $next)
    {
        if(in_array(Auth::user()->role, $this->roles)){
            return $next($request);
        }else{
            abort(419, 'ACCESS DENIED');
        }
    }
}
