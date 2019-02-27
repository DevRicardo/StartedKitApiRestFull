<?php

namespace App\Http\Requests\Core\User;

use App\Http\Requests\Core\ApiRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            //
            /*'name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required', 
            'password'=>'required'
            Rule::unique('users', 'email')->ignore($this->route('user')->id),*/
        ];
    }
}
