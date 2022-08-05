<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function sendResponse($result)
    {

        $response = [
            'data' => $result,
        ];

        return response()->json($response, 200);
    }
    public function sendConfirmationResponse($value)
    {

        $response = [
            'success' =>$value
        ];


        return response()->json($response, 200);
    }
    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
