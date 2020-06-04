<?php

namespace App\Http\Middleware;

use App\Models\Administrador;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $admin = Administrador::where('idAdministrador',$request['idAdministrador'])->where('token',$request['token'])->get();
        if(!$admin->isEmpty()) {
            return $next($request);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
