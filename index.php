<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require 'vendor/autoload.php';
use Stichoza\GoogleTranslate\TranslateClient;

set_time_limit(0);
if (isset($_GET['id'])){
        $id = $_GET['id'];
        $url = "http://www.omdbapi.com/?i={$id}&apikey=KEY_API_OMDB";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
            header('Content-Type: application/json');
            
         curl_close($ch);
        // echo $result;
        // trigger_error($result);
        $hasil=json_decode($result,true);

        $tr = new TranslateClient(); // Default is from 'auto' to 'en'
        $tr->setSource('en'); // Translate from English
        $tr->setTarget('id'); // Translate to Georgian
        $sinopsis = $tr->translate($hasil['Plot']);
        
        $url = 'https://www.imdb.com/title/'.$hasil['imdbID'];

        $arr = Array (
            "title" => $hasil['Title'],
            "year" => $hasil['Year'],
            "rating" => $hasil['Rated'],
            "released" => $hasil['Released'],
            "duration" => $hasil['Runtime'],
            "director" => $hasil['Director'],
            "writer" => $hasil['Writer'],
            "actors" => $hasil['Actors'],
            "synopsis" => $sinopsis,
            "language" => $hasil['Language'],
            "country" => $hasil['Country'],
            "image_url" => $hasil['Poster'],
            "score" => $hasil['imdbRating'],
            "imdbid" => $hasil['imdbID'],
            "url" => $url,
            "type" => $hasil['Type'],
            "production" => $hasil['Production'],
            "website" => $hasil['Website'],
        );
        $json = json_encode($arr, JSON_PRETTY_PRINT);
        echo($json);
    } else {
        echo "Contoh : https://imdb.syafawi.my.id/?id=tt7286456";
        echo "<br> masukan id dari IMDB contoh : https://www.imdb.com/title/tt7286456 ";        
    }
?>
