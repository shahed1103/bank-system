<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingAccountDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'savings_account_id',
        'currentinterestrate',
        'monthlywithdrawalsmade',
        'amount',
    ];

    /**
     */
    public function account()
    {
        return $this->morphOne(Account::class, 'accountable');
    }

    /**

     */
    public function savingsAccountSetting()
    {
        return $this->belongsTo(SavingsAccount::class, 'savings_account_id');
    }
}
