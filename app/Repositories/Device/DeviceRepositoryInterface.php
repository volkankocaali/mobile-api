<?php

namespace App\Repositories\Device;

use App\Models\Device;

interface DeviceRepositoryInterface{

    public function create($data):Device;

}
