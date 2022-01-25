<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
     protected $table = 'service';
    
    protected $fillable = [
        'serviceprovider',
        'entry',
        'departure',
        'diagnosis',
        'description',
        'km',
    ];

    protected $guarded = [
        'id',
    ];
}
