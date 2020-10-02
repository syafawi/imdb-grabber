IMDB Grabber with translate to other language. 
You can modify it by looking here : https://github.com/Stichoza/google-translate-php (Google Translate API free)

when using you must first register with omdbapi to get the API key from omdbapi, you can get it here : http://www.omdbapi.com/apikey.aspx

after get API key, replace in $url = "http://www.omdbapi.com/?i={$id}&apikey=KEY_API_OMDB"; , KEY_API_OMDB to your API key

Example site :
http://imdb.syafawi.my.id/?id=tt7286456
