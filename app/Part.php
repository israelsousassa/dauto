<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table = 'part';
    
    protected $fillable = [
        'name',
        'refcode',
        'quantity',
        'unitvalue',
    ];

    protected $guarded = [
        'id',
    ];
}
