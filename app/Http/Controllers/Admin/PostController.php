<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

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
        $user = Auth::user();

        //$posts = Post::All(); -> con la FK questo diventa:
        
        //$posts = Post::with('category')->All();
        //$posts = Post::All();

        $data = [
            'posts' => Post::with('category')->get(),
        ];
        //dd($data);        
        
        
        return view('admin.post.index', compact('user'), $data);
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

        return view('admin.post.create', compact('categories'));
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

        //validazione
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $new_post = new Post();
        $new_post->fill($data);
        $new_post->save();

        return redirect()->route('admin.post.index');
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

        return view('admin.post.edit', compact('elem'));
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

        $elem->update($data);

        return redirect()->route('admin.post.show', $elem->id);
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
        $elem->delete();

        return redirect()->route('admin.post.index'); 
    }
}
