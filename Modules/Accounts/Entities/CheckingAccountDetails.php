<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckingAccountDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'checking_accounts_id',
        'allows_overdraft',
        'current_overdraft_used',
        'amount'
    ];

    // علاقة polymorphic عكسية للوصول إلى بيانات الحساب الأساسية
    public function account()
    {
        return $this->morphOne(Account::class, 'accountable');
    }

    // علاقة بإعدادات الحساب الجاري
    public function checkingAccountSetting()
    {
        return $this->belongsTo(CheckingAccount::class, 'checking_accounts_id');
    }
}

