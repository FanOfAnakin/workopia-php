<?php

namespace App\controllers;

class ErrorController
{


    public static function notFound($message = 'Resource Not Found!')
    {
        http_response_code(404);
        loadView('error', [
            'status' => 404,
            'message' => $message
        ]);
    }

    public static function unAutho($message = 'You Are Not Authorized To View This Resource!')
    {
        http_response_code(403);
        loadView('error', [
            'status' => 403,
            'message' => $message
        ]);
    }
}
