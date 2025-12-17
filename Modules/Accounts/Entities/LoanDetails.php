<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'requested_principal_amount',
        'approved_principal_amount',
        'remaining_principal',
        'interest_rate_at_disbursement',
        'requested_term_months',
        'approved_date',
        'next_payment_date',
        'monthly_payment_amount',
        'rejected_resion'
    ];

    /**

     */
    public function account()
    {
        return $this->morphOne(Account::class, 'accountable');
    }

    /**

     */
    public function loanAccountSetting()
    {
        return $this->belongsTo(LoanAccount::class, 'loan_id');
    }
}
