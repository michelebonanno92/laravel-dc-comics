@extends('layouts.app')

@section('page-title', 'Crea Comic')

@section('main-content')
<h1>
   Crea Comic
</h1>

<form action="{{ route('comics.store') }}" method="POST">
   <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" class="form-control" id="title" name="tile" placeholder="Inserisci il titolo">
    </div>
    <div class="mb-3">
      <label for="thumb" class="form-label">Copertina</label>
      <input type="text" class="form-control" id="thumb" name="thumb" placeholder="Inserisci la copertina">
    </div>
    <div class="mb-3">
      <label for="sale_date" class="form-label">Data di vendita</label>
      <input type="text" class="form-control" id="sale_date" name="sale_date" placeholder="Inserisci la data di vendita">
    </div>
    <div class="mb-3">
      <label for="series" class="form-label">Serie</label>
      <input type="text" class="form-control" id="series" name="series" placeholder="Inserisci la serie">
    </div>
    <div class="mb-3">
      <label for="type" class="form-label">Tipo</label>
      <select class="form-select" id="type" name="type">
         <option selected disabled>Seleziona un tipo</option>
         <option value="comic book">Fumetto</option>
         <option value="graphic novel">Graphic novel</option>
       </select>
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Prezzo</label>
      <input type="number" class="form-control" id="price" name="price" placeholder="Inserisci il prezzo">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Descrizione</label>
      <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary w-100">
     + Aggiungi
    </button>

</form>



@endsection