<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'account_number',
        'account_name',
        'balance',
        'currency',
        'status',
        'opened_at',
        'closed_at',
        'accountable_id',
        'accountable_type',
    ];

    // علاقة polymorphic للحصول على تفاصيل الحساب
    public function accountable()
    {
        return $this->morphTo();
    }

    // علاقة مع العميل (إذا كان لديك موديل Customer)
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
