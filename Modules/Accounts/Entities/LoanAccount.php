<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanProductSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'interest_rate',
        'interestratetype',
        'latepaymentfees',
        'processing_fees',
        'earlyrepaymentpenalty',
        'maxtenuremonths',
        'minloanamount',
        'maxloanamount',
        'is_active',
    ];

    /**

     */
    public function loanDetails()
    {
        return $this->hasMany(LoanDetails::class, 'loanproductsetting_id');
    }
}
