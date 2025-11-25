<?php

namespace App\Services;

use Illuminate\Http\Client\Response;

class HttpResponseService
{
    public static function handle(Response $response)
    {
        $status = $response->status();

        switch ($status) {
            case 200:
                return response()->json([
                    'success' => true,
                    'data' => $response->json(),
                ], 200);

            case 400:
                return response()->json([
                    'error' => 'Bad Request. Invalid input.',
                ], 400);

            case 401:
                return response()->json([
                    'error' => 'Unauthorized. Please check your credentials.',
                ], 401);

            case 403:
                return response()->json([
                    'error' => 'Forbidden. You do not have access to this resource.',
                ], 403);

            case 404:
                return response()->json([
                    'error' => 'Not Found. The requested resource does not exist.',
                ], 404);

            case 422:
                return response()->json([
                    'error' => 'Unprocessable Entity. Validation failed.',
                    'details' => $response->json(),
                ], 422);

            case 429:
                return response()->json([
                    'error' => 'Too Many Requests. Please slow down.',
                ], 429);

            case 500:
                return response()->json([
                    'error' => 'Internal Server Error. Please try again later.',
                ], 500);

            case 503:
                return response()->json([
                    'error' => 'Service Unavailable. The server is currently unavailable.',
                ], 503);

            default:
                return response()->json([
                    'error' => 'Unexpected error occurred.',
                    'status' => $status,
                    'details' => $response->body(),
                ], $status);
        }
    }
}
