<?php

namespace Modules\Transaction\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'send_account_id',
        'recive_account_id',
        'amount',
        'approv',

    ];

/**
 * Get the user that owns the Transfer
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
    public function senderAccount(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'send_account_id');
    }

       public function receiverAccount(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'recive_account_id');
    }
}
