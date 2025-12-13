<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class LoanAccount extends Model
{
    protected $fillable = [
        'account_id',
        'loan_amount',
        'interest_rate',
        'term_months',
        'monthly_payment',
        'start_date',
        'end_date',
        'remaining_balance'

    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}
