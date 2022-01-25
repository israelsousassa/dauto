<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
     protected $table = 'vehicle';
    
    protected $fillable = [
        "plate",
        "state",
        "category",
        "type",
        "manufacturer",
        "model",
        "version",
        "yearmanufacturer",
        "yearmodel",
        "potency",
        "enginecapacity",
        "transmission",
        "steering",
        "doors",
        "air",
        "fuel",
        "color",
        "person_id",
        "person_users_id"
    ];

    protected $guarded = [
        'id',
    ];
}
