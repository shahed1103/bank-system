<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckingAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'minimum_balance',
        'overdraft_limit',
        'overdraft_fees',
        'monthly_fees',
//        'is_active',
    ];

    /**
     * Get the checking account details associated with this setting.
     */
    public function checkingAccountDetails()
    {
        return $this->hasMany(CheckingAccountDetails::class, 'checking_accounts_id');
    }
}
