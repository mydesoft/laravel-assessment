<?php
namespace App\Traits;
use Illuminate\Http\JsonResponse;

trait ApiResponseNormalizer{

    /**
     * success
     *
     * @param [type] $body
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiSuccess($msg, $body = null): JsonResponse
    {
        return response()->json([
            'success' => true,
            'msg' => $msg,
            'data' => $body
        ],200);
    }
    
    
    /**
     * notFound
     *
     * @param [type] $body
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiNotFound($msg, $body = null):JsonResponse
    {
         return response()->json([
            'success' => false,
            'msg' => $msg,
            'data' => $body
        ],404);
        
    }

    

    
}