<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\ComicController;


   
    Route::get('/', function () {
        return redirect()->route('comics.index');
    // return view('welcome', [
    // ]);
     });
    // return view('comics.index'', compact('argomento 1', 'argomento 2'));

    Route::get('/chi-siamo', function () {
    return view('subpages.about', [
    ]);
    });

    Route::resource('comics', ComicController::class);
    // crea le 7 rotte per la crud


// Route::get(PERCORSO CON CUI ARRIVARE ALLA PAGINA, FUNZIONE DI CALLBACK CHE MI CREA LA RISPOSTA DA DARE ALL UTENTE)
