<?php

namespace App\Http\Repositories\Core;

use App\Http\Repositories\BaseRepository;
use App\Models\Core\OneToMany;


class RelationRepository extends BaseRepository
{
    public $modelClass = OneToMany::class;
}