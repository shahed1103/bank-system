<?php

namespace Modules\Accounts\ValidationRules;
use Modules\Accounts\Entities\AccountType;

class AccountCreateRules
{
    public static function rules($accountTypeId): array
    {
        $baseRules = [
            'account_type_id' => ['required', 'exists:account_types,id'],
            'account_name' => ['required', 'string'],
            'additional_data' => ['required', 'array'],
        ];

    $type = AccountType::find($accountTypeId)?->name;

    return match ($type) {

        'savings' => array_merge($baseRules, [
            // 'additional_data.name' => ['required', 'string'],
            'additional_data.amount' => ['required', 'numeric'],
        ]),
        

        'checking' => array_merge($baseRules, [
            // 'additional_data.name' => ['required', 'string'],
            'additional_data.amount' => ['required', 'numeric'],
            'additional_data.allows_overdraft' => ['required', 'boolean'],
        ]),

    //     'loan' => array_merge($baseRules, [
    //         'additional_data.loan_amount' => ['required', 'numeric'],
    //         'additional_data.interest_rate' => ['required', 'numeric'],
    //         'additional_data.term_months' => ['required', 'integer'],
    //         'additional_data.monthly_payment' => ['required', 'numeric'],
    //         'additional_data.start_date' => ['required', 'date'],
    //         'additional_data.end_date' => ['required', 'date', 'after:additional_data.start_date'],
    //         'additional_data.remaining_balance' => ['required', 'numeric'],
    //     ]),

        'investment' => array_merge($baseRules, [
            'additional_data.requested_investment_amount' => ['required', 'numeric'],
            'additional_data.risk_level' => ['nullable', 'in:low,medium,high'],
        ]),

        default => $baseRules,
    };
    }
}
