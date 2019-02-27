<?php

namespace App\Http\Repositories\Core\User;

use App\Http\Repositories\BaseRepository;
use App\Models\Core\User;


class UserRepository extends BaseRepository
{
    public $modelClass = User::class;
}