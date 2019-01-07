<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse($result, $message, $extra = [])
    {
        $result = ($result ? ($result == "[]" ? [] : $result) : json_decode("{}"));
        return response ()->json(['status' => TRUE, 'data' => $result, 'message' => $message, 'extra' => $extra]);
    }

    public function sendError($result, $message, $extra = [], $code = 404)
    {
        $result = ($result ? ($result == "[]" ? [] : $result) : json_decode("{}"));
        return response ()->json(['status' => FALSE, 'data' => $result, 'message' => $message, 'extra' => $extra]);
    }
}
