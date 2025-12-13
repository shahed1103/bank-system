<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class RiskLevel extends Model
{
    protected $fillable = [
        'level'
    ];

    public function investmentAccounts(){
        return $this->hasMany(InvestmentAccount::class);
    }
}
