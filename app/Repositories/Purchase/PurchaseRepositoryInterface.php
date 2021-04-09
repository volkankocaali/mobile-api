<?php

namespace App\Repositories\Purchase;

use App\Models\Purchase;

interface PurchaseRepositoryInterface{

    public function create($data) : Purchase;
    public function find($id) : Purchase;

}
