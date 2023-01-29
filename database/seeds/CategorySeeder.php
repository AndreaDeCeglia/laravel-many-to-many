<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'antipasti',
            'primi',
            'secondi',
            'contorni',
            'dolci'
        ];

        foreach($categories as $category){
            $new_category = new Category;
            $new_category->name = $category;
            $new_category->save();
        }

        //compilato il Seeder, prima di lanciare da terminale
        // php artisan db:seed //
        //bisogna andare a compilare il DatabaseSeeder
    }
}
