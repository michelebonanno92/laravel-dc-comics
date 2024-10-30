<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     * Visualizza un elenco della risorsa.
     */
    public function index()
    {
        $comics = Comic::get();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     * Mostra il modulo per creare una nuova risorsa.
     */
    public function create()
    {
        return view('comics.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *Archivia una risorsa appena creata nell'archivio.
     * 
     */
    public function store(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $comic = new Comic();
        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        // dd($data['thumb']);
        $priceNumber = floatval($data['price']);
        $comic->price =  $priceNumber;
        // dd($priceNumber);
        $comic->series = $data['series'];
        // dd($data['series']);
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
        // con il metodo json
        $explodeArtists = explode(',', $data['artists']);
        $jsonArtists= json_encode($explodeArtists);
        // dd($jsonArtists);
        $comic->artists = $jsonArtists ;
        // $implodeWriters = implode('|', $data['writers']);
        $correctwriters = str_replace(',','|', $data['writers']);
        $comic->writers = $correctwriters;
        $comic->save();

        
        return redirect()->route('comics.show', ['comic' => $comic->id]);
        // oppure
        // return redirect()->route('comics.index');
        // dd($comic);
    }

    /**
     * Display the specified resource.
     * Visualizza la risorsa specificata.   
     */
    public function show(Comic $comic)
    {

        // per gestire l'errore 404
        if (!$comic){
        abort(404);
        }
        // oppure scrivendo 
        // $comic = Pasta::findOrFail($id);

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     * Mostra il modulo per modificare la risorsa specificata.
     */
    public function edit(Comic $comic)
    {
        // per gestire l'errore 404
        // if (!$comic){
        //     abort(404);
        // }
        // oppure scrivendo 
        $comic = Comic::findOrFail($comic);

        return view('comics.edit', compact('comic'));
       
    }

    /**
     * Update the specified resource in storage.
     * Aggiorna la risorsa specificata nell'archivio.
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        // dd($data);
        $comic = Comic::findOrFail($comic);
        // rispetto all'create qui non mi serve una nuova istanza di comic ma modifico quella già creata
        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        // dd($data['thumb']);
        $priceNumber = floatval($data['price']);
        $comic->price =  $priceNumber;
        // dd($priceNumber);
        $comic->series = $data['series'];
        // dd($data['series']);
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
        // con il metodo json
        $explodeArtists = explode(',', $data['artists']);
        $jsonArtists= json_encode($explodeArtists);
        // dd($jsonArtists);
        $comic->artists = $jsonArtists ;
        // $implodeWriters = implode('|', $data['writers']);
        $correctwriters = str_replace(',','|', $data['writers']);
        $comic->writers = $correctwriters;
        $comic->update($data);

        
      
        return redirect()->route('comics.show', ['comic' => $comic->id]);



    }

    /**
     * Remove the specified resource from storage.
     * Rimuovere la risorsa specificata dall'archivio.
     */
    public function destroy(Comic $comic)
    {
        //
    }
}
