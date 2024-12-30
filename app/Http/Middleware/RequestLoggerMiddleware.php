<?php

namespace App\Http\Middleware;

use App\Models\ApiLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequestLoggerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->wantsJson())
            ApiLog::create([
                'url' => $request->path(),
                'method' => $request->method(),
                'headers' => json_encode($request->header()),
                'body' => json_encode($request->all()),
                'response' => $response->getContent(),
            ]);

        return $response;
    }
}
