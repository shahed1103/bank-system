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
        
    return [
        'account_type_id' => ['required', 'exists:account_types,id'],
        'account_name' => ['required', 'string'],
        'additional_data' => ['required', 'array'],
    ];

    $type = AccountType::find($this->input('account_type_id'))?->name;

    return match ($type) {

        'savings' => array_merge($baseRules, [
            'additional_data.name' => ['required', 'numeric'],
            'additional_data.amount' => ['required', 'string'],
        ]),
        

    //     'checking' => array_merge($baseRules, [
    //         'additional_data.overdraft_limit' => ['required', 'numeric'],
    //         'additional_data.monthly_fee' => ['required', 'numeric'],
    //     ]),

    //     'loan' => array_merge($baseRules, [
    //         'additional_data.loan_amount' => ['required', 'numeric'],
    //         'additional_data.interest_rate' => ['required', 'numeric'],
    //         'additional_data.term_months' => ['required', 'integer'],
    //         'additional_data.monthly_payment' => ['required', 'numeric'],
    //         'additional_data.start_date' => ['required', 'date'],
    //         'additional_data.end_date' => ['required', 'date', 'after:additional_data.start_date'],
    //         'additional_data.remaining_balance' => ['required', 'numeric'],
    //     ]),

    //     'investment' => array_merge($baseRules, [
    //         'additional_data.risk_level_id' => ['required', 'exists:risk_levels,id'],
    //         'additional_data.invested_amount' => ['required', 'numeric'],
    //         'additional_data.expected_return_rate' => ['required', 'numeric'],
    //         'additional_data.current_value' => ['required', 'numeric'],
    //     ]),

    //     default => $baseRules,
    };
}


    protected function failedValidation(Validator $validator){

        //Throw a validationexception eith the translated error messages
        $message = "you have sent invalid data";

        throw new ValidationException($validator, Response::Validation([], $message , $validator->errors()));
    }
}
