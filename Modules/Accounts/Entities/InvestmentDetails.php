<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentDetails extends Model
{
    use HasFactory;
     use LogsActivity;

    protected $fillable = [
        'investment_account_id',
        'requested_investment_amount',
        'balance',
        'rejected_rasion',
        'risk_level',
        'approved_date',
        'account_id',

    ];

    /**
     * Get the parent account model.
     */
    // public function account()
    // {
    //     return $this->morphOne(Account::class, 'accountable');
    // }

    public function account(){
        return $this->belongsTo(Account::class);
    }

    /**
     * Get the product settings for this investment.
     */
    public function investmentAccountSetting()
    {
        return $this->belongsTo(InvestmentAccount::class, 'investment_account_id');
    }
}
