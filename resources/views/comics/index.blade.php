@extends('layouts.app')

@section('page-title', 'Comics')

@section('main-content')
<h1>
   Comics
</h1>
<table class="table">
   <thead>
     <tr>
       <th scope="col">Id</th>
       <th scope="col">Titolo</th>
       <th scope="col">Serie</th>
       <th scope="col">Tipo</th>
       <th scope="col">Prezzo</th>
     </tr>
   </thead>
   <tbody>
      @foreach ($comics as $comic )
         <tr>
            <th scope="row">{{ $comic->id }}</th>
            <td>{{ $comic['title']}}</td>
            <td>{{ $comic->series }}</td>
            <td>{{ $comic->type }}</td>
            <td>€ {{ number_format($comic->price, 2, ',', '.') }}</td>
            <td>
               {{-- dove mettiamo la rotta show , poi il parametro che si scrive in maniera esplicita con un array associativo con il nome del parametro in questo caso "comic" e poi il valore dell'id che deve prendere il parametro stesso --}}
               <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-primary">
                  VEDI
               </a>
            </td>


         </tr>
       
      @endforeach
   </tbody>
 </table>




@endsection