<?php

use App\Http\Controllers\Api\v1\CheckSubscription;
use App\Http\Controllers\Api\v1\PurchaseController;
use App\Http\Controllers\Api\v1\RegisterController;
use App\Http\Controllers\Api\v1\VerificationApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register',RegisterController::class);

Route::middleware('auth:sanctum')->group(function () {


    // Verification Mock Api
    Route::get('verification/{receipt}',VerificationApiController::class);

    Route::post('purchase',[PurchaseController::class,'verification']);
    Route::get('check-subscription',CheckSubscription::class);

});
