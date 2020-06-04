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
        $admin = null;
        if($admin = Administrador::where([
            ['idAdministrador',$request->idAdministrador],
            ['token',$request->token]])->get()) {
            Log::info($admin);
            return $next($request);
        } else {
            return response()->json('Acceso no autorizado', 401);
        }

    }
}
