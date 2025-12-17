<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'interest_rate',
        'interest_rate_type',
        'late_payment_fees',
        'processing_fees',
        'max_tenure_months',
        'min_loan_amount',
        'max_loan_amount',

    ];

    /**

     */
    public function loanDetails()
    {
        return $this->hasMany(LoanDetails::class, 'loanproductsetting_id');
    }
}
