
        <!-- php artisan make:migration update_add_cover_posts_table --table=posts     -->


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAddCoverPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // creazione della nuova colonna, che nello specifico accoglierà le immagini
            //le IMMAGINI VENGONO SALVATE COME STRINGHE
            // e la f()  ->after('nome_colonna') , specifica in quale posizione(dopo quale colonna) della tabella andare ad inserire la nuova colonna
            $table->string('cover')->nullable()->after('body');
            //poi ricordarsi semopre di andare a scrivere la down();
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
            //
            $table->dropColumn('cover');
            //finito l'aggiornamento lanciare da terminale
            //   php artisan migrate   //
            //migrata la nuova colonna bisognerà 
            // 1-ANDARE NEL MODELLO CHELLA TAB AGGIORNATA AD AGGIUNGERE LA NUOCA COLONNA
            // 2-ANDARE A LAVORARE SUL CONTROLLER RISORSA @STORE
        });
    }
}
