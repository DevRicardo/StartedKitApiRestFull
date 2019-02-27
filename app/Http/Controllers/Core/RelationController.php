<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Core\RelationRepository;
use App\Models\Core\OneToMany;
use App\Http\Requests\Core\ApiRequest;

class RelationController extends Controller
{
    //
    private $relationRepository;

    public function __construct(RelationRepository $relationRepository)
    {
        $this->relationRepository = $relationRepository;
    }


    public function storeOneToMany(ApiRequest $request)
    {
        $result = $this->relationRepository->store($request);
        dd($result);
    }
}
