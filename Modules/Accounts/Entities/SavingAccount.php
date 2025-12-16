<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class SavingAccount extends Model
{
    protected $fillable = [
        'account_id',
        'interest_rate',
        'minimum_balance',
        'withdraw_limit_per_month',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}
