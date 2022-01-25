<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';
    
    protected $fillable = [
        'lastname',
        'datebirth',
        'cell',
        'unitvalue',
    ];

    protected $guarded = [
        'id',
        'cpf',
    ];
}
