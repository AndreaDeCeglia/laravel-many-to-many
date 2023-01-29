<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        //funzione DI RELAZIONE per spiegare a Laravel, ed al DB, la relazione
    //1toMany -> 1
    public function posts(){   // nome f() = nome Modello di riferimento -> in questo caso plurale perchè 1category to Mani Posts
        return $this->hasMany('App\Models\Post');           //il record ha molti Post associati
    }
}
