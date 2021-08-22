<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

class Verification {

    public static function get(string $receiptKey)
    {
        $request = Request::create('/api/verification/'.$receiptKey, 'GET');
        $response = Route::dispatch($request)->getContent();
        return json_decode($response);
    }
}
