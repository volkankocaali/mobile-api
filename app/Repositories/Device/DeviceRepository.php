<?php

namespace App\Repositories\Device;

use App\Models\Device;

class DeviceRepository implements DeviceRepositoryInterface {

    public $model;

    public function __construct(Device $device)
    {
        $this->model = $device;
    }

    public function create($data) :Device
    {
        return $this->model->create($data);
    }

}
