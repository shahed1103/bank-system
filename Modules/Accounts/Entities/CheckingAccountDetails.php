<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckingAccountDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'checking_account_setting_id',
        'allows_overdraft',
        'current_overdraft_used',
    ];

    // علاقة polymorphic عكسية للوصول إلى بيانات الحساب الأساسية
    public function account()
    {
        return $this->morphOne(Account::class, 'accountable');
    }

    // علاقة بإعدادات الحساب الجاري
    public function settings()
    {
        return $this->belongsTo(CheckingAccountSetting::class, 'checking_account_setting_id');
    }
}

