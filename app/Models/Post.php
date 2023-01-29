<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        //avendo creato la relazione 1tM dopo la tabella, bisogna aggiungere la FK nel Fillable
        'category_id'
        //dopo averla inserita qui, ci sono 2 possib.
        //o si va ad inserire la nuova colonna all'interno della Migr. Post e poi da Terminale
        // php artisan migrate:refresh //
        //oppure andare a creare una nuova Migr. d'aggiornamento
        // php artisan make:migration update_add_category_id_posts_table --table=posts //
    ];

    //funzione DI RELAZIONE per spiegare a Laravel, ed al DB, la relazione
    // 1toMay -> Post avrà la FK, quindi Many
    public function category(){   // nome f() = nome Modello di riferimento -> in questo caso sing perchè 1category to Many posts
        return $this->belongsTo('App\Models\Category');     //il record ha solo UNA cat. associata
    }
}
