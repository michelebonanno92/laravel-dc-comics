<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models 
use App\Models\Comic;
// collegamento al Model Comic

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Comic::truncate();

        $comics = config('comics');
        // ci prendiamo tutti i comics dal faile in config
        foreach ( $comics as $singleComic) {
            $comic = new Comic();
            $comic->title = $singleComic['title'];
            $comic->description = $singleComic['description'];
            $comic->thumb = $singleComic['thumb'];
            // dd($singleComic['thumb']);
            $priceNumber = floatval(substr($singleComic['price'],1));
            $comic->price =  $priceNumber;
            // dd($priceNumber);
            $comic->series = $singleComic['series'];
            // dd($singleComic['series']);
            $comic->sale_date = $singleComic['sale_date'];
            $comic->type = $singleComic['type'];
            // con il metodo json
            $jsonArtists = json_encode($singleComic['artists']);
            // dd($jsonArtists);
            $comic->artists = $jsonArtists ;
            $implodeWriters = implode('|', $singleComic['writers']);
            $comic->writers = $implodeWriters;
            $comic->save();
        



        }
    }
}
