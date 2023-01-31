<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            //quando i Seeder sono più di 1, bisogna andare a creare un array..
            //l'ordine è importante
            [
                PostSeeder::class,
                CategorySeeder::class,
                TagSeeder::class
            ]
        );
    }
}
