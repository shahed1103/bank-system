<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Accounts\Services\Account\AccountFactory;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_number',
        'account_name',
        // 'balance',
        'currency',
        'opened_at',
        'closed_at',
        'account_type_id',
        'account_status_id',
        'status_resion',
        'parent_account_id'
    ];

    public function user(){
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

    public function parent(){
        return $this->belongsTo(Account::class, 'parent_account_id');
    }

    public function children(){
        return $this->hasMany(Account::class, 'parent_account_id');
    }

    public function getOwnBalance(): float{
        $factory = app(AccountFactory::class);

        $service = $factory->make($this->account_type_id);

        return $service->getOwnBalance($this);
    }
}
