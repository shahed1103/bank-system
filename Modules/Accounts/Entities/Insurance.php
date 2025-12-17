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
}

