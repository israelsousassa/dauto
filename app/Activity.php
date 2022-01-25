<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity';
    
    protected $fillable = [
        'name',
        'value',
    ];

    protected $guarded = [
        'id',
    ];
}
