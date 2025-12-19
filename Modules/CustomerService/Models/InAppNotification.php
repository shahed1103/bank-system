<?php

namespace Modules\CustomerService\Models;

use Illuminate\Database\Eloquent\Model;

class InAppNotification extends Model
{
    protected $table = 'in_app_notifications';

    protected $fillable = [
        'user_id',
        'type',
        'data',
        'is_read',
    ];

    protected $casts = [
        'data'    => 'array',
        'is_read' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
