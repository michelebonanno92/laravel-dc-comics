@extends('layouts.app')

@section('page-title', $comic->title)

@section('main-content')
<h1>
  {{ $comic->title }}
</h1>

<div class="card">
   <div class="card-body">
      <ul>
         <li>
            Prezzo: € {{ number_format($comic->price, 2, ',', '.') }}
         </li>
         <li>
            Serie: {{ $comic->series }}
         </li>
         <li>
            Data di vendita: {{ $comic->sale_date }}
         </li>
         <li>
            Tipo: {{ $comic->type }}
         </li>
         <li>
            Artisti: 
            <ul>
               {{-- oppure --}}
               {{-- @php
                  $decodeArtists = json_decode($comic->artists, true);
               @endphp --}}
               {{-- @foreach ($decodeArtists as $artist ) --}}
               @foreach (json_decode($comic->artists,true)  as $artist )
                  <li>
                     {{ $artist }}
                  </li>
               @endforeach
            </ul>
         </li>
         <li>
            Scrittori:
            <ul>
               @foreach (explode('|', $comic->writers) as $writer )
                  <li>
                     {{ $writer }}
                  </li>
                  
               @endforeach
            </ul>
         </li>
      </ul>
      <p>
         {{ $comic->description }}
      </p>
   </div>
   <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" class="card-img-bottom">
</div>

@endsection