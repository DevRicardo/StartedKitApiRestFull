<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class  BaseRepository implements IRepository
{

    public $modelClass;
    private $tableName;


    public function __construct()
    {
        $this->tableName = call_user_func(array(new $this->modelClass, 'getTable'));
    }    
    
    
    public function find(string $params)
    {
        $instanceModel = new $this->modelClass();
        $query = $instanceModel->query();

        $collection = collect($instanceModel->search);

        $collection->each(function ($value, $key) use ($query, $params){
            $query->orWhere($value, 'like','%'.$params.'%' );
        });
        
        return $query->paginate(10);
    }

    public function store(array $request)
    {
        $this->model = new $this->modelClass($request);
        $this->model->save();
        return $this->model;
    }

    public function update(array $request, Model $model)
    {
        $collection = collect($request);

        $collection->each(function ($value, $key) use($model) {         
            $model->{$key} = $value;
        });
        $model->save();
        return $model;  
    }

    public function show(Model $model)
    {  
        return $model;
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }
    
    public function findById(int $id)
    {
        
    } 
    
}
