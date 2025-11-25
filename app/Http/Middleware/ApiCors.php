<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiCors
{
    public function handle(Request $request, Closure $next)
    {
        // Allowed domains (add your production & dev domains here)
        $allowedOrigins = [
            'http://localhost:3000', // dev
            'http://127.0.0.1:3000', // dev
            // 'http://127.0.0.1:8000', // dev
            // 'http://localhost:8000', // dev
        ];

        $origin = $request->headers->get('Origin');
        if ($origin && in_array($origin, $allowedOrigins)) {
            header('Access-Control-Allow-Origin: ' . $origin);
            header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
            header('Access-Control-Allow-Headers: Content-Type, Authorization');
            header('Access-Control-Allow-Credentials: true');

            if ($request->getMethod() === "OPTIONS") {
                return response('', 200);
            }

            return $next($request);
        }

        // Block request if origin is not allowed
        return response()->json(['message' => 'Unauthorized request origin.'], 403);
    }
}