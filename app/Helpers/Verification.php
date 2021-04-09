<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use PhpParser\Node\Stmt\Return_;

class Verification {


    /**
     * @param string $receiptKey
     * @param string $token
     */
    public static function get(string $receiptKey,string $token = "1|ECbDfdWXO6NH1GcadI2UfGpqOSOO8Ium7sO9iTuH") :JsonResponse
    {

        $response = Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'Authorization' => 'Bearer '.$token,
        ])
            ->withToken($token)
            ->get('http://localhost:8000/api/verification/'.$receiptKey)
            ->json();

        return Response::json($response);
    }
}
