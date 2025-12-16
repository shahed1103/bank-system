<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'loanproductsetting_id',
        'principal_amount',
        'remaining_principal',
        'interestrateat_disbursement',
        'term_months',
        'disbursement_date',
        'nextpaymentdate',
        'monthlypaymentamount',
    ];

    /**

     */
    public function account()
    {
        return $this->morphOne(Account::class, 'accountable');
    }

    /**

     */
    public function productSetting()
    {
        return $this->belongsTo(LoanProductSetting::class, 'loanproductsetting_id');
    }
}
