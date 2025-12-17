<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'investment_product_setting_id',
        'requested_investment_amount',
        'approval_investment_amount',
        'rejected_rasion',
        'risk_level',
        'approved_date',
    ];

    /**
     * Get the parent account model.
     */
    public function account()
    {
        return $this->morphOne(Account::class, 'accountable');
    }

    /**
     * Get the product settings for this investment.
     */
    public function productSetting()
    {
        return $this->belongsTo(InvestmentProductSetting::class, 'investment_product_setting_id');
    }
}
