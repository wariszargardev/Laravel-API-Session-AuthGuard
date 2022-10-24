<?php
namespace App\Http\Traits\Api;

use Illuminate\Http\JsonResponse;

trait ApiResponse {

    public function successResponse($data = [], $message = '' , $status = 200): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'data' => $data,
            'message' => $message
        ], $status);
    }

    public function errorMessage($message = '' , $status = 404): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message
        ], $status);
    }

}
