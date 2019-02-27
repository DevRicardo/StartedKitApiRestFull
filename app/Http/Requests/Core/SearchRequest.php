<?php

namespace App\Http\Requests\Core;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'search'=>'required'
        ];
    }
}
