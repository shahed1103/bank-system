<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function accounts(){
        return $this->hasMany(Account::class);
    }
}
