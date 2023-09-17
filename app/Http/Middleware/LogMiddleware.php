<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        file_put_contents('C:/data/access.log', date('Y-m-d H:i:s')."\n", FILE_APPEND);

        $request->merge([
            'title' => '速習Laravel',
            'author' => 'YAMADA, Yoshihiro',
        ]);
        return $next($request);
    }

    public function middle()
    {
        return 'log is recorded!!';
    }
}
