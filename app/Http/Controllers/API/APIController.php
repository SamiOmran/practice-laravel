<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class APIController extends Controller
{
    public function sendResponse(string $message, int $status, JsonResource|array $data = null): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ])->setStatusCode($status);
    }

    public function sendFailure(string $message, int $status = 400): JsonResponse
    {
        return $this->sendResponse($message, $status);

    }

    public function sendCreated(string $message, JsonResource|array $data = null): JsonResponse
    {
        return $this->sendResponse($message, 201, $data);
    }

}
