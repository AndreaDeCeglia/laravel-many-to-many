<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //dopo il comando da temrinale
    // php artisan make:model Models/Tag -ms //
    // f() -> Relazione ManyToMany -> in questo caso con  i tag
    public function posts(){
        return $this->belongsToMany('App\Models\Post');
    }
    //dopo di che si apre la Migration, per andare a realizzare
    //la prima tabella ... quella dei Tags !!
}
