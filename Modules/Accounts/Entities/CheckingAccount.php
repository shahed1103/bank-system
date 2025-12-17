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
        // 'checking_account_setting_id' هو اسم العمود المفتاح الأجنبي في جدول checking_account_details
        return $this->hasMany(CheckingAccountDetails::class, 'checking_account_setting_id');
    }
}
