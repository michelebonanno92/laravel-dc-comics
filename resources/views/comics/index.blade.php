@extends('layouts.app')

@section('page-title', 'f')

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
         </tr>
       
      @endforeach
   </tbody>
 </table>




@endsection