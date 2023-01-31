<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            //dopo aver compilato i modelli
            $table->string('name');
            //e dopo aver compilato la Migration
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}

//si lancia da temrinale il comando
// php artisan migrate //
//per andare fisicamente a creare la tabella

//dopodichè si va a creare la tabella di Pivot lanciando il comando da terminale:
// php artisan make:migration create_post_tag_table --create=post_tag //
//poi si compila la Migration della Pivot