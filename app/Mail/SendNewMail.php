<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

//  questo file è stato creato dal comando da terminale 
//    php artisan make:mail SendNewMail   


class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $post;

    public function __construct()
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //questa funzione ci riporta alla View del documento che conterrà la struttura HTML della mail che verrà inviata automaticamente
        //difatti andiamo a creare all'interno di RESOURCES -> mails/posts/createdPost.blade.php
        return $this->view('mails.posts.createPostMail', ['post' => $this->post]);
        //scritta la f(), dobbiamo andare nel PostController a specificare cosa/come/quando/perchè/come inviare la mail
        //considerando che la mail sarà mandato alla creazione di un nuovo port, dovremo agire nell f() STORE
        //RICORDANDO SEMPRE DI IMPORTARE L'UTILIZZO DEL MODELLO A MONTE DEL CONTROLLER :
        //use App\Mail\SendNewMail;
        //use Illuminate\Support\Facades\Mail;
    }
}
