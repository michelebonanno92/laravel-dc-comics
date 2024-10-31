@extends('layouts.app')

@section('page-title', 'Modifica'.$comic->title)

@section('main-content')
<h1>
   Modifica {{ $comic->title }}
</h1>

@if ($errors->any())
  <div class="alert alert-danger my-4">
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
@endif

<form action="{{ route('comics.update',['comic' => $comic->id]) }}" method="POST">
   @csrf
   @method('PUT')

   <div class="mb-3">
      <label for="title" class="form-label">Titolo<span class="text-danger">*</span></label>
      <input 
        type="text" 
        class="form-control"
        id="title"
        name="title"
        required maxlength="128"
        placeholder="Inserisci il titolo"
        {{-- aggiunti nel valiue dell'edit un secondo argomento che verrà preso nel caso in cui non si sia scatenato un errore e quindi non avremo l'old allora prenderà il valore di defoult  --}}
        value="{{old('title'), $comic->title }}">
        @error('title')
        <div class="alert alert-danger mt-2">
           Errore Titolo: {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="thumb" class="form-label">Copertina</label>
      <input 
        type="text"
        class="form-control"
        id="thumb"
        name="thumb"
        placeholder="Inserisci la copertina"
        maxlength="2048"
        value="{{$comic->thumb}}">
    </div>

    <div class="mb-3">
      <label for="sale_date" class="form-label">Data di vendita</label>
      <input
      type="text"
      class="form-control"
      id="sale_date" 
      name="sale_date"
      placeholder="Inserisci la data di vendita"
      value="{{$comic->sale_date}}">
    </div>

    <div class="mb-3">
      <label for="series" class="form-label">Serie<span class="text-danger">*</span></label>
      <input
      type="text"
      class="form-control" 
      id="series" 
      name="series" 
      placeholder="Inserisci la serie" 
      required maxlength="64"
      value="{{$comic->series}}">
    </div>

    <div class="mb-3">
      <label for="type" class="form-label">Tipo<span class="text-danger">*</span> </label>
      <select 
        class="form-select" 
        id="type" 
        name="type" 
        required 
        maxlength="64">
         <option
            @if (old('type', $comic->type) === null  ||  old('type', $comic->type) == '')
               selected
            @endif 
            disabled>Seleziona un tipo</option>
         <option 
            @if (old('type', $comic->type) == 'Fumetto')
              selected
            @endif
            value="comic book">Fumetto</option>
         <option
            @if (old('type', $comic->type) == 'Graphic novel')
              selected
            @endif 
            value="graphic novel">Graphic novel</option>
       </select>
    </div>

    <div class="mb-3">
      <label for="price" class="form-label">Prezzo<span class="text-danger">*</span></label>
      <input
        type="number" 
        class="form-control" 
        id="price" 
        name="price" 
        placeholder="Inserisci il prezzo"
        required max="999.99"
        value="{{$comic->price}}">
    </div>
   </div>

   <div class="mb-3">
     <label for="artists" class="form-label">Artisti</label>
     <input 
      type="text" 
      class="form-control" 
      id="artists" 
      name="artists" 
      aria-describedby="artists-help" 
      placeholder="Inserisci gli artisti">
      {{-- value="{{$comic->artists}}" --}}
     <div id="artists-help" class="form-text">
         Inserisci i nomi degli artisti separati da virgole
      </div>
   </div>

   <div class="mb-3">
      <label for="writers" class="form-label">Scrittori</label>
      <input 
        type="text" 
        class="form-control" 
        id="writers" 
        name="writers" 
        aria-describedby="writers-help" 
        placeholder="Inserisci gli scrittori">
        {{-- value="{{$comic->writers}}" --}}
      <div id="writers-help" class="form-text">
          Inserisci i nomi degli scrittori separati da virgole
       </div>
    </div>


    <div class="mb-3">
      <label for="description" class="form-label">Descrizione<span class="text-danger">*</span></label>
      <textarea 
        class="form-control" 
        id="description" 
        name="description" 
        rows="3" 
        required maxlength="4096" 
        placeholder="Inserisci la descrizione">{{$comic->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-warning w-100" value="Invia">
     Aggiorna
    </button>

</form>



@endsection