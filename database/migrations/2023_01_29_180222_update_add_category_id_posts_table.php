<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//il nome l'ho deciso io inserendolo custom nel terminale
//trasformato dinamicamente in CamelCase
class UpdateAddCategoryIdPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //lo Schema è table, e non create, essendo una migration d'update
            //qua si va a specificare la nuova colonna
            //e specificare il collegamento tra col.PK in categories, e la col.FK in posts
            $table->unsignedBigInteger('category_id')->nullable();
            //creata la colonna va creato il legame
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            //f()->la FK category_id -> è rispettivamente ID -> nella tab 'categories' -> se cancelli un post non cancelli il collegamento con la tab di riferimento
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //qua bisogna specificare che dropando, si va a cancellare nella Tab la Col in questione
            $table->dropForeign('posts_category_id_foreign');
            $table->dropColumn('category_id');
             // fatto ciò si può lanciare giusto un
            // php artisan migrate //
        });
    }
}
