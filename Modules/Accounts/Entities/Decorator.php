<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decorator extends Model
{
  protected $fillable =
   [  'account_id',
    'insurance',
    'insurances_id',
    'premium_services',
    'premium_services_id',
    'total_cost'];

}
