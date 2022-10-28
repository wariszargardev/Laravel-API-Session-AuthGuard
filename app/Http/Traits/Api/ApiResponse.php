<?php
namespace App\Http\Traits\Api;

use Illuminate\Http\JsonResponse;

trait ApiResponse {

    public function successResponse($data = [], $message = '' , $status = 200): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'data' => $data,
            'successMessage' => $message
        ], $status);
    }

    public function errorMessage($message = '' , $status = 404): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'errorMessage' => $message
        ], $status);
    }

}
