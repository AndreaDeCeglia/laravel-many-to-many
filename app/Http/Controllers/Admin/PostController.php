<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

//utilizzo di Auth -> chiedere
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //per avere a disposizione in pagine i dati dell'utente loggato:
        //$user = Auth::user();

        //$posts = Post::All(); -> con la FK questo diventa:
        
        //$posts = Post::with('category')->All();
        //$posts = Post::All();

        $data = [
            'user' => Auth::user(),
            'posts' => Post::with('category', 'tags')->get()
        ];
        //dd($data);        
        
        
        return view('admin.post.index', $data);
        //una volta ritornata la vista, andare a creare il link che
        //faccia atterrare alla lista dei Post
        //in questo caso in admin.home
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //creata la relaz. si inviano le info
        $categories = Category::All();
        //creati Tag con relativa Pivot:
        $tags = Tag::All();

        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->All();
        //tramite la $request->All() recupero tutti i dati
        //il category_id ed il tags[] ..
        // la $request->All(), fa capo agli attributi NAME e VALUE di ogni TAG
        // e li salva tutti in un array chiamato $data

        //dd($data);

        //validazione
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $new_post = new Post();
        $new_post->fill($data);
        $new_post->save();

        //creata la nuova istanza, si va a fare un check riguardo la possibile
        // selezione di Tags
        if( array_key_exists( 'tags', $data ) ){
            $new_post->tags()->sync( $data['tags'] );
        }
        //nel caso di relazione tra i new_post e tags, verrà generato
        //un nuovo record per relazione nella Pivot

        //fatto qua, lo stesso procedimento andrà fatto in EDIT, in EDIT.BLADE ed in UPDATE
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $elem = Post::findOrFail($id);

        //$categories = Category::All();

        return view('admin.post.show', compact('elem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $elem = Post::findOrFail($id);

        $categories = Category::All();

        $tags = Tag::All();

        return view('admin.post.edit', compact('elem', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->All();
        $elem = Post::findOrFail($id);


        //create le check in pagina, si va a fare lo stesso ciclo della STORE
        if (array_key_exists('tags', $data)) {
            $elem->tags()->sync($data['tags']);
            //aggiungendo un ELSE nel caso di nessuna CHECK selezionata
        } else {
            $elem->tags()->sync([]);
        };
        //nel caso di Deselezione, il controllo va ad eliminare
        //la REALAZIONE della PIVOT
        //poi DESTROY

        $elem->update($data);

        //return view('admin.post.show', compact('elem'));
        return redirect()->route('admin.posts.show', $elem->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $elem = Post::findOrFail($id);
        //qua si va a puntualizzare che nel cancellare il singolo Post
        //andrà cancellata anche la RELAZIONE nella PIVOT
        $elem->tags()->sync([]);
        $elem->delete();

        //$user = Auth::user();

        //return view('admin.post.index'); 
        //return view('admin.post.index', compact('user'));
        return redirect()->route('admin.posts.index');


    }
}
