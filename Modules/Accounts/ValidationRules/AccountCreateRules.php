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
}
