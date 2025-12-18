<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PremiumServices extends Model
{
     protected $fillable = [
        'name',
        'cost',
        'description'
    ];


        public function decorator()
    {
        // Account has one Decorator
        return $this->hasOne(Decorator::class);
    }
}
