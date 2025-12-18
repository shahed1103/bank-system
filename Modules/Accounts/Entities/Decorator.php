<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decorator extends Model
{
  protected $fillable =
   [
    'account_id',
    'insurance',
    'insurances_id',
    'premium_services',
    'premium_services_id',
    'total_cost'];


    public function account()
    {
        // Decorator belongs to Account
        return $this->belongsTo(Account::class);
    }


        public function insurance(): BelongsTo
    {
        return $this->belongsTo(Insurance::class);
    }

        public function premium()
    {
        // Decorator belongs to Account
        return $this->belongsTo(PremiumServices::class);
    }

}
