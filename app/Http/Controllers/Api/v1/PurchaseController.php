<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\RateLimit;
use App\Helpers\Verification;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Repositories\Purchase\PurchaseRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PurchaseController extends Controller
{

    public $purchaseRepository;
    public function __construct(PurchaseRepositoryInterface $purchaseRepository)
    {
        $this->purchaseRepository = $purchaseRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function verification(Request $request): JsonResponse
    {
        $receiptHash = $request->receipt_hash;
        $device = $request->user();

        // Verification Api
        $response = Verification::get($receiptHash);

        // Create Database
        $return = $this->purchaseRepository->create([
            'device_id' => $device->id,
            'receipt_token' => $receiptHash,
            'status' => $response->status,
            'expire_date' => $response->expire_date,
        ]);

        return Response::json(['result' => 1, 'data' => $return],200);
    }
}
