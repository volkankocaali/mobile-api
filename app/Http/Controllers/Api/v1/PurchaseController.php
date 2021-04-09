<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\Verification;
use App\Http\Controllers\Controller;
use App\Repositories\Purchase\PurchaseRepositoryInterface;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Input\Input;

class PurchaseController extends Controller
{

    public $purchaseRepository;
    public function __construct(PurchaseRepositoryInterface $purchaseRepository)
    {
        $this->purchaseRepository = $purchaseRepository;
    }

    public function verification(Request $request){
        //$str = Str::uuid();
        $receiptHash = $request->receipt_hash;
        $device = $request->user();

        // Verification Api

        $response = Verification::get($receiptHash);

        print_r($response); die();
        /*$request = Request::create('/api/verification/'.$receipt_hash, 'GET');
        $response = Route::dispatch($request);*/


        // Create Database
        $return = $this->purchaseRepository->create([
            'device_id' => $device->id,
            'receipt_token' => $receiptHash,
            'status' => $response->original['status'],
            'expire_date' => $response->original['expire_date'],
        ]);

        return Response::json($return,200);

    }
}
