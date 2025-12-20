<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivity;

class AccountStatus extends Model
{
    use LogsActivity;
    protected $fillable = [
        'name',
    ];

    public function accounts(){
        return $this->hasMany(Account::class);
    }
}
