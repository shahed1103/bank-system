<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Http\Responses\response;

class UserSignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     *
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'password' => 'required|confirmed|min:8',
            'phone' => 'required|string|max:20|unique:users,phone',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'national_id' => 'required|digits:11|unique:users,national_id',
            'birth_date' => 'required|date|before:today',
        ];
    }

    protected function failedValidation(Validator $validator){

        //Throw a ValidationException with the translated error messages
        $message = "you have sent invalid data";

        throw new ValidationException($validator, Response::Validation([], $message , $validator->errors()));
    }
}
