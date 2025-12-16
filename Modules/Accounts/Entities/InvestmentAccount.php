<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentProductSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'expected_returns',
        'minimum_investment',
        'managementfeespercentage',
        'lockinperiod_months',
        'risk_level',
        'is_active',
    ];

    /**
     */
    public function investmentDetails()
    {
        return $this->hasMany(InvestmentDetails::class, 'investmentproductsetting_id');
    }
}
