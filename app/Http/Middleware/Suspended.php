<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Suspended
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->member && $request->user()->member->is_banned) {
            abort(403);
        }
        return $next($request);
    }
}
