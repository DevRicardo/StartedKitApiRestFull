<?php

namespace App\Http\Requests\Core;


use Illuminate\Foundation\Http\FormRequest;
use App\Http\Traits\Core\FormatResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class ApiRequest extends FormRequest
{
    use FormatResponse;


    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(
            $this->error($this->MESSAGE_ERROR_VALIDATION, $validator->errors()->all(), 422)
        ); 
    }


    public function rules()
    {
        return [];
    }
    
}
