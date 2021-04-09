<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class VerificationApiController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param $receipt
     * @return JsonResponse
     */
    public function __invoke(Request $request, string $receipt) : JsonResponse
    {
        $character = substr($receipt,-1);

        if (is_numeric($character) && $character % 2 !== 0){
            return Response::json(['status' => 1,'expire_date' => Carbon::now()]);
        }
        return Response::json(['status' => 0,'expire_date' => null]);

    }
}
