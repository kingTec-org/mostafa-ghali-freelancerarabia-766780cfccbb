<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function sendResponse($status,$message,$data,$code)
    {
        return response()->json([
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ],$code);
    }
}
