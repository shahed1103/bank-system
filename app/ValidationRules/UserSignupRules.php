<?php

namespace App\ValidationRules;

class UserSignupRules
{
    public static function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'password' => 'required|confirmed|min:8',
            'phone' => 'required|string|regex:/^\+963[0-9]{9}$/|max:13|unique:users,phone',
            'photo' => 'required|image|max:2048',
            'id_photo' => 'required|image|max:2048',
            'national_id' => 'required|digits:11|unique:users,national_id',
            'birth_date' => 'required|date|before:today',
        ];
    }
}
