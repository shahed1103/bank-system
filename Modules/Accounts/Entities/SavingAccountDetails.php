<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingAccountDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'account_id',
        'savings_account_id',
        'currentinterestrate',
        'monthlywithdrawalsmade',
        'amount',
    ];

    /**
     */
    public function account(){
        return $this->belongsTo(Account::class);
    }

    /**

     */
    public function savingsAccountSetting()
    {
        return $this->belongsTo(SavingsAccount::class, 'savings_account_id');
    }
}
