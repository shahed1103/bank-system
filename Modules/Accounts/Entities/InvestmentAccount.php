<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentAccount extends Model
{
    use HasFactory;

    protected $fillable = [

        'expected_returns',
        'minimum_investment',
        'managementfeespercentage',
        'year_version'
    ];

    /**
     */
    public function investmentDetails()
    {
        return $this->hasMany(InvestmentDetails::class, 'investmentproductsetting_id');
    }
}
