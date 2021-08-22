<?php

namespace App\Repositories\Purchase;

use App\Models\Purchase;

class PurchaseRepository implements PurchaseRepositoryInterface {

    public $model;

    public function __construct(Purchase $purchase)
    {
        $this->model = $purchase;
    }

    public function create($data) : Purchase
    {
        return $this->model->create($data);
    }
    public function find($id) : Purchase {
        return $this->model->where('device_id',$id)->first();
    }

}
