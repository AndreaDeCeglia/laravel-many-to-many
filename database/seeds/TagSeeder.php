<?php

use Illuminate\Database\Seeder;
//aggiungere sempre l'utilizzo del Modella
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //scritta la relazione fisica, sevo andarmi a dedicare alla
        //devo creare il seeder per andare a popolare la tabella
        $tags = [
            'carne',
            'pesce',
            'vegetariano',
            'vegano',
            'senza lattosio'
        ];

        foreach( $tags as $tag ){
            $new_tag = new Tag();
            $new_tag->name = $tag;
            $new_tag->save();
        }
    }
}

//e ricordarsi di andare ad aggiungere -> TagSeeder::class
//all'interno dell'Array del DatabaseSeeder

// php artisan db:seed //
//per andare a riempire la tabella tags

//creato tutto, si mandano i dati in Front attraverso il ùposController