<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingAccountDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'savingaccountsetting_id',
        'currentinterestrate',
        'monthlywithdrawalsmade',
        'lastinterestpayout_date',
    ];

    /**
     */
    public function account()
    {
        return $this->morphOne(Account::class, 'accountable');
    }

    /**

     */
    public function settings()
    {
        return $this->belongsTo(SavingAccountSetting::class, 'savingaccountsetting_id');
    }
}
