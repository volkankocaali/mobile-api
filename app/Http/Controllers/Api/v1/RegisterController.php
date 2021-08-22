<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DeviceRequest;
use App\Repositories\Device\DeviceRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class RegisterController extends Controller
{
    protected $deviceRepository;
    protected $userRepository;

    public function __construct(DeviceRepositoryInterface $deviceRepository,UserRepositoryInterface $userRepository)
    {
        $this->deviceRepository = $deviceRepository;
        $this->userRepository = $userRepository;
    }
    /**
     * Handle the incoming request.
     *
     * @param DeviceRequest $request
     * @return JsonResponse
     */

    public function __invoke(DeviceRequest $request): JsonResponse
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
