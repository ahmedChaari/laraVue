<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'      => 'required',
            'address'   => 'required',
            'email'     => 'required|string|unique:users,email',
            'tel'       => 'nullable',
            'role_id'   => 'required',
            'company_id'=>'required',
          //  'password'    => 'required|string|confirmed',
        ];
    }
}
