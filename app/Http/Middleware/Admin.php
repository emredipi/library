<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        abort_unless(
            $request->user()->admin,
            redirect()->route('member.books', $request->user()->id)
        );
        return $next($request);
    }
}
