<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface {

    public $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function create($data) :User
    {
        return $this->model->create($data);
    }

}
