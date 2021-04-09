<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepositoryInterface{

    public function create($data):User;

}
