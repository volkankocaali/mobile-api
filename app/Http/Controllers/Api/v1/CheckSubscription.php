<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Repositories\Purchase\PurchaseRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CheckSubscription extends Controller
{

    public $purchaseRepository;

    public function __construct(PurchaseRepositoryInterface $purchaseRepository)
    {
        $this->purchaseRepository = $purchaseRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function __invoke(Request $request) :JsonResponse
    {
        $device = $request->user();
        $purchase = $this->purchaseRepository->find($device->id)->first();


        return Response::json([
            'check_subscription' => $purchase->status,
            'expire_date' => $purchase->expire_date,
        ]);
    }
}
