@extends('layouts.app')

@section('page-title', 'Crea Comic')

@section('main-content')
<h1>
   Crea Comic
</h1>

@if ($errors->any())
  <div class="alert alert-danger my-4">
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
@endif

  </div>

<form action="{{ route('comics.store') }}" method="POST">
   @csrf
   <div class="mb-3">
      <label for="title" class="form-label">Titolo<span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="title" name="title" required maxlength="128" placeholder="Inserisci il titolo"  value="{{old('title')}}">
      {{-- l'old serve per quando si scatena un errore dove i vari campi rimangono riempiti del precedente  valore inserito atraverso il value--}}
      @error('title')
        <div class="alert alert-danger mt-2">
           Errore Titolo: {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="thumb" class="form-label">Copertina</label>
      <input type="text" class="form-control" id="thumb" name="thumb" placeholder="Inserisci la copertina" maxlength="2048" value="{{old('thumb')}}">
    </div>

    <div class="mb-3">
      <label for="sale_date" class="form-label">Data di vendita</label>
      <input type="text" class="form-control @if($errors->has('sale_date')) is-invalid @else is-valid @endif" id="sale_date" name="sale_date" placeholder="Inserisci la data di vendita" value="{{old('sale_date')}}">
    </div>

    <div class="mb-3">
      <label for="series" class="form-label">Serie<span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="series" name="series" placeholder="Inserisci la serie" required maxlength="64" value="{{old('series')}}">
    </div>

    <div class="mb-3">
      <label for="type" class="form-label">Tipo<span class="text-danger">*</span> </label>
      <select class="form-select" id="type" name="type" required maxlength="64">
         <option selected disabled>Seleziona un tipo</option>
         <option value="comic book">Fumetto</option>
         <option value="graphic novel">Graphic novel</option>
       </select>
    </div>

    <div class="mb-3">
      <label for="price" class="form-label">Prezzo<span class="text-danger">*</span></label>
      <input type="number" class="form-control @error('price') is-invalid @enderror"    id="price" name="price" placeholder="Inserisci il prezzo" required max="999.99" value="{{old('price')}}">
    </div>
   </div>

   <div class="mb-3">
     <label for="artists" class="form-label">Artisti</label>
     <input type="text" class="form-control" id="artists" name="artists" aria-describedby="artists-help" placeholder="Inserisci gli artisti" value="{{old('artists')}}">
     <div id="artists-help" class="form-text">
         Inserisci i nomi degli artisti separati da virgole
      </div>
   </div>

   <div class="mb-3">
      <label for="writers" class="form-label">Scrittori</label>
      <input type="text" class="form-control" id="writers" name="writers" aria-describedby="writers-help" placeholder="Inserisci gli scrittori" value="{{old('writers')}}">
      <div id="writers-help" class="form-text">
          Inserisci i nomi degli scrittori separati da virgole
       </div>
    </div>


    <div class="mb-3">
      <label for="description" class="form-label">Descrizione<span class="text-danger">*</span></label>
      <textarea class="form-control" id="description" name="description" rows="3" required maxlength="4096" placeholder="Inserisci la descrizione"></textarea>
    </div>
    <button type="submit" class="btn btn-primary w-100">
     + Aggiungi
    </button>

</form>



@endsection