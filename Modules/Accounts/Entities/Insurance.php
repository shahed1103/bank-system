<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
 protected $fillable = [
        'name',
        'cost',
        'insurance_code'
    ];


    public function decorator()
    {
        // Account has one Decorator
        return $this->hasOne(Decorator::class);
    }
}

