<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'interest_rate',
        'interestratetype',
        'latepaymentfees',
        'processing_fees',
        'earlyrepaymentpenalty',
        'maxtenuremonths',
        'minloanamount',
        'maxloanamount',
    ];

    /**

     */
    public function loanDetails()
    {
        return $this->hasMany(LoanDetails::class, 'loanproductsetting_id');
    }
}
