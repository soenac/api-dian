<?php

namespace App\Http\Middleware;

use Closure;
use App\Log;

class ApiLog
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::create([
            'payload' => [
                'body' => $request->toArray(),
                'uri' => $request->getRequestUri(),
            ],
            'user_id' => optional(auth()->user())->id,
        ]);

        return $next($request);
    }
}
