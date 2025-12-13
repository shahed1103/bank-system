<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'user_id',
        'account_type_id',
        'account_status_id',
        'account_number',
        'balance',
        'parent_account_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function parent() {
        return $this->belongsTo(Account::class, 'parent_account_id');
    }

    public function children() {
        return $this->hasMany(Account::class, 'parent_account_id');
    }
    
    public function type(){
        return $this->belongsTo(AccountType::class, 'account_type_id');
    }

    public function status(){
        return $this->belongsTo(AccountStatus::class, 'account_status_id');
    }
}
