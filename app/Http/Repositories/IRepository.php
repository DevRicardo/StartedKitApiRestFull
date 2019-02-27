<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Core\ApiRequest;



interface  IRepository
{
    public function store(array $request);
    public function update(array $request, Model $model);
    public function show(Model $model);
    public function delete(Model $model);
    public function find(string $params);
    public function findById(int $id);   
}
