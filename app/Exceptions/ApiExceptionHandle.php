<?php


namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response as HttpResponse;

trait ApiExceptionHandle
{
    private function processApiException($exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return $this->apiErrorResponse($exception->getMessage(), HttpResponse::HTTP_NOT_FOUND);
        } else if ($exception instanceof RecordNotFoundException) {
            return $this->apiErrorResponse($exception->getMessage(), HttpResponse::HTTP_NOT_FOUND);
        } else if ($exception instanceof BadRequestException) {
            return $this->apiErrorResponse($exception->getMessage(), HttpResponse::HTTP_BAD_REQUEST);
        } else if ($exception instanceof SomethingWentWrongException) {
            return $this->apiErrorResponse($exception->getMessage(), HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
        } elseif ($exception instanceof AuthenticationException) {
            return $this->apiErrorResponse($exception->getMessage(), HttpResponse::HTTP_UNAUTHORIZED);
        }
        return $this->apiErrorResponse($exception->getMessage(), HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * this function is used to return the api response to the user
     *
     * @param string $message
     * @param integer $status_code
     * @return void
     */
    private function apiErrorResponse($message, $status_code)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => [],
        ], $status_code);
    }
}
