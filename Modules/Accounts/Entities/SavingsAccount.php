<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingAccount extends Model
{
    use HasFactory;
protected $fillable = [
        'interest_rate',
        'minimumbalancefor_interest',
        'freewithdrawlimitpermonth',
        'withdrawfeeafter_limit',
    ];

    /**
     */
    public function savingAccountDetails()
    {
        return $this->hasMany(SavingAccountDetails::class, 'savings_account_id');
    }
}
