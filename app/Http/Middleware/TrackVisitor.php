<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        Visitor::firstOrCreate(

            [
                'ip_address' => $request->ip(),
                'visit_date' => now()->toDateString()
            ],

            [
                'user_agent' => substr(
                    $request->userAgent(),
                    0,
                    255
                ),

                'page_url' => $request->fullUrl(),

                'visit_date' => now()->toDateString()
            ]
        );


        return $next($request);
    }
}
