<?php

namespace Modules\CustomerService\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CustomerService\Database\Factories\TicketFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'subject', 'status_id'];

    public function messages(){
        return $this->hasMany(TicketMessage::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

     public function status(){
        return $this->belongsTo(Status::class);
    }
}

