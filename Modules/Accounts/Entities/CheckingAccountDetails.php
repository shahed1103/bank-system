<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckingAccountDetails extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $fillable = [
        'name',
        'checking_accounts_id',
        'allows_overdraft',
        'current_overdraft_used',
        'balance',
        'account_id',

    ];


    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function checkingAccountSetting(){
        return $this->belongsTo(CheckingAccount::class, 'checking_accounts_id');
    }
}

