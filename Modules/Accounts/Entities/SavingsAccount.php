<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingAccountSetting extends Model
{
    use HasFactory;
protected $fillable = [
        'name',
        'interest_rate',
        'minimumbalancefor_interest',
        'freewithdrawlimitpermonth',
        'withdrawfeeafter_limit',
        'is_active',
    ];

    /**
     */
    public function savingAccountDetails()
    {
        return $this->hasMany(SavingAccountDetails::class, 'savingaccountsetting_id');
    }
}
