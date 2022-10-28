<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiRequestLog extends Model
{
    protected $fillable = [
        'incoming_url',
        'request',
        'response',
    ];
}
