<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AppAuthApi
{

    private $trustedDomains = [
        'raqm.online',
        'backend.raqm.online',
        '127.0.0.1',
        '127.0.0.1:8000',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //return response($request->getHost());
        $token = $request->header('app-token');
        // return response([
        //     $request->getHost(),
        //     $this->trustedDomains,
        //     $token,
        //     env('JWT_SECRET'),
        // ]);$token != env('JWT_SECRET') ||

        if (!in_array($request->getHost(), $this->trustedDomains)) {
            return response([
                'status' => true,
                'message' => trans('not allowed'),
            ], 405);
        }
        return $next($request);
        //return response(responseJson(false, trans('admin.unauthorized'), []), 401);
    }
}
