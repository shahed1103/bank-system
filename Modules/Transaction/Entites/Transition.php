<?php

namespace Modules\Transaction\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transition extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'type',
        'amount',
        'approv',

    ];

    /**
     * Get the checking account details associated with this setting.
     */

}
