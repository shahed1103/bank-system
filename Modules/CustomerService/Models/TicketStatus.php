<?php

namespace Modules\CustomerService\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketStatus extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

