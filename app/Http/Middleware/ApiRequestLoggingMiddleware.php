<?php

namespace App\Http\Middleware;
use App\Models\ApiRequestLog;

class ApiRequestLoggingMiddleware
{
    public function handle($request, \Closure  $next)
    {

        if(env('IS_ENABLE_API_LOG')) {
            ApiRequestLog::create([
                'incoming_url' => $request->url(),
                'request' => serialize($request->all()),
                'response' => "response",
            ]);
        }

        return $next($request);
    }

    public function terminate($request, $response)
    {

    }

}
