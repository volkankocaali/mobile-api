<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DeviceRequest;
use App\Repositories\Device\DeviceRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class RegisterController extends Controller
{
    private $deviceRepository;
    private $userRepository;

    public function __construct(DeviceRepositoryInterface $deviceRepository,UserRepositoryInterface $userRepository)
    {
        $this->deviceRepository = $deviceRepository;
        $this->userRepository = $userRepository;
    }
    /**
     * Handle the incoming request.
     *
     * @param DeviceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function __invoke(DeviceRequest $request): \Illuminate\Http\JsonResponse
    {
        $device = $this->deviceRepository->create([
            'uid' => $request->uid,
            'app_id' => $request->app_id,
            'language' => $request->language,
            'operating_system' => $request->operating_system,
        ]);


        return Response::json([
            'token'=> $device->createToken($request->app_id)->plainTextToken,
            'device' => $device,
        ]);


    }
}
