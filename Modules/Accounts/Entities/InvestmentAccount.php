<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class InvestmentAccount extends Model
{
    protected $fillable = [
        'account_id',
        'risk_level_id',
        'expected_return_rate',
        'invested_amount',
        'current_value',
    ];

    public function account(){
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function riskLevel(){
        return $this->belongsTo(RiskLevel::class, 'risk_level_id');
    }
}
