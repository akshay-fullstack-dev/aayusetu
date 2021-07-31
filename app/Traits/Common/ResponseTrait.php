<?php



namespace App\Traits\Common;

use Illuminate\Http\Response as HttpResponse;

trait ResponseTrait
{
    private function apiResponse($data, $message, $status_code = HttpResponse::HTTP_OK)
    {
        return response()->json(['status' => $status_code, 'message' => $message, 'data' => $data]);
    }
    private function lang_message($key)
    {
        return trans($this->language_path . $key);
    }
}
