<?php

namespace Modules\Accounts\ValidationRules;

class AccountCreateRules
{
    public static function rules(): array
    {
        return [
            'account_type_id' => ['required', 'exists:account_types,id'],
        ];
    }
}
