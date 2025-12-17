<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentProductSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'expected_returns',
        'minimum_investment',
        'managementfeespercentage',
//        'is_active',
    ];

    /**
     */
    public function investmentDetails()
    {
        return $this->hasMany(InvestmentDetails::class, 'investmentproductsetting_id');
    }
}
