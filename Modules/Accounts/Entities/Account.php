<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_number',
        'account_name',
        'balance',
        'currency',
        // 'status',
        'opened_at',
        'closed_at',
        'account_type_id',
        'account_status_id',
        // 'accountable_id',
        // 'accountable_type',
        'status_resion'
    ];

    // // علاقة polymorphic للحصول على تفاصيل الحساب
    // public function accountable()
    // {
    //     return $this->morphTo();
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accountType(){
        return $this->belongsTo(AccountType::class);
    }

    public function accountStatus(){
        return $this->belongsTo(AccountStatus::class);
    }


    public function savingDetails(){
        return $this->hasOne(SavingAccountDetails::class);
    }

    public function checkingDetails(){
        return $this->hasOne(CheckingAccountDetails::class);
    }

    public function investmentDetails(){
        return $this->hasOne(InvestmentDetails::class);
    }

    public function loanDetails(){
        return $this->hasOne(LoanDetails::class);
    }
}
