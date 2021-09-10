<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Book => books

    // in maniera del tutto automatica 
    // la classe parent Model, crea tutte le 
    // proprietà interne alla class Book,
    // che corrispondono alle singole colonne
    // della nostra tabella

    /*
    public $id;
    public $title;
    public $abstract;
    public $cover;
    public $price;
    */

}
