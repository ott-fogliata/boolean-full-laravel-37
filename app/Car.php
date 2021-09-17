<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [  // che possono essere riempiti a partire da un array associativo
        'brand',
        'model_name',
        'engine',
        'hp',
        'vin',
        'color',
        'picture',
        'brand_new',
        'price'
    ];


}
