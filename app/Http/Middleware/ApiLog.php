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
            'user_id' => optional(auth()->user())->id,
            'payload' => $request->toArray(),
        ]);

        return $next($request);
    }
}
