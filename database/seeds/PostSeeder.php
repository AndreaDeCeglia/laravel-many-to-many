<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_post = config('initPosts');
        
        foreach($array_post as $elem){
            $new_post = new Post();
            $new_post->title = $elem['title'];
            $new_post->body = $elem['body'];
            $new_post->save();
        };
    }
}
