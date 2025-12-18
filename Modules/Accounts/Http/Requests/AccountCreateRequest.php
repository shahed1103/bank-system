<?php

namespace Modules\Accounts\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Http\Responses\response;
use Modules\Accounts\Entities\AccountType;


class AccountCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array{
        
    $baseRules = [
                'account_type_id' => ['required', 'exists:account_types,id'],
                'account_name' => ['required', 'string'],
                'parent_account_id' => 'nullable|exists:accounts,id',
                'additional_data' => ['required', 'array'],
        ];

    $type = AccountType::find($this->input('account_type_id'))?->name;

    return match ($type) {

        'savings' => array_merge($baseRules, [
            // 'additional_data.name' => ['required', 'string'],
            'additional_data.balance' => ['required', 'numeric'],
        ]),
        
                'checking' => array_merge($baseRules, [
            // 'additional_data.name' => ['required', 'string'],
            'additional_data.balance' => ['required', 'numeric'],
            'additional_data.allows_overdraft' => ['required', 'boolean'],
        ]),

        'loan' => array_merge($baseRules, [
            'additional_data.requested_principal_amount' => ['required', 'numeric'],
            'additional_data.requested_term_months' => ['required', 'numeric'],
        ]),

        'investment' => array_merge($baseRules, [
            'additional_data.requested_investment_amount' => ['required', 'numeric'],
            'additional_data.risk_level' => ['nullable', 'in:low,medium,high'],
        ]),
        
        default => $baseRules,
    };
}


    protected function failedValidation(Validator $validator){

        //Throw a validationexception eith the translated error messages
        $message = "you have sent invalid data";

        throw new ValidationException($validator, Response::Validation([], $message , $validator->errors()));
    }
}
