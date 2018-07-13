<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:2|max:30',
            'created_by' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'marital_status' => 'required'

            // 'phone' => 'nullable|numeric'
        ];
    }


    public function failedValidation(Validator $validator) {
        // /print_r($validator);
        Throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => $validator->errors()
        ], 422 ));
    }
}
