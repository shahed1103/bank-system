<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class CheckingAccount extends Model
{
    protected $fillable = [
        'account_id',
        'overdraft_limit',
        'monthly_fee',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}
