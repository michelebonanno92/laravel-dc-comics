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

    // Route::get('/comics',[ComicController::class, 'index'])->name('comics.index');
    // Route::get('/comics/create',[ComicController::class, 'create'])->name('comics.create');
    // Route::post('/comics',[ComicController::class, 'store'])->name('comics.store');
    // Route::get('/comics/{id}',[ComicController::class, 'show'])->name('comics.show');
    // Route::get('/comics/{id}/edit',[ComicController::class, 'edit'])->name('comics.edit');
    // Route::put('/comics/{id}',[ComicController::class, 'update'])->name('comics.update');
    // Route::delete('/comics/{id}',[ComicController::class, 'destroy'])->name('comics.destroy');


    Route::resource('comics', ComicController::class);
    // crea le 7 rotte per la crud in una sola riga


// Route::get(PERCORSO CON CUI ARRIVARE ALLA PAGINA, FUNZIONE DI CALLBACK CHE MI CREA LA RISPOSTA DA DARE ALL UTENTE)
