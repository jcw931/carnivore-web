<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carnivore Cruise</title>
<style type="text/css">
#Container {
	height: auto;
	width: 1000px;
	margin-right: auto;
	margin-left: auto;
}

#Body {
	height: auto;
	width: 1000px;
}
#Footer {
	height: 100px;
	width: 1000px;
	margin-right: auto;
	margin-left: auto;
}
#navBar {
	height: 28px;
	width:1000px;
	}
#navBar ul { 
	margin: 0; 
	padding: 5px; 
	list-style-type: none; 
	text-align: left; 
	background-color: #FFFFFF; 
	} 
 
#navBar ul li {  
	display: inline; 
	} 
 
#navBar ul li a { 
	text-decoration: none; 
	padding: .2em 1em; 
	color: #000000; 
	background-color: #FFFFFF; 
	} 
 
#navBar ul li a:hover { 
	text-decoration: underline; 
	background-color: #fff; 
	} 
#body {
	height: 400px;
	width: 1000px;
	margin-top: auto;
	margin-right: auto;
	margin-bottom: auto;
	margin-left: auto;
}
#image {
	height: auto;
	width: 1000px;
}
#dropdown {
	height: auto;
	width: 1000px;
	right: 100px;
}
</style>
<div id="Container">
  <div id="navBar">
    <ul>
      <li><a href="carnivoreCruise.php">Home</a></li>
      <li><a href="cruises.php">Cruises</a></li>
      <li><a href="artist.php">Featured Artist</a></li>
      <li><a href="history.php">History</a></li>
    </ul>
  </div>
  <div id="body">
    <div id="image"> <img src="image3.jpg" width="1000" height="400" alt=""/> </div>


<form method="post">

<p>
Popular Artists at our Venues!
<select name="artist">
<option value="">Select...</option>
<option value="taylor swift">Taylor Swift</option>
<option value="sam smith">Sam Smith</option>
<option value="maroon 5">Maroon 5</option>
<option value="post malone">Post Malone</option>
<option value="marshmello">Marshmello</option>
<option value="kanye west">Kanye West</option>
</select>
</p><input type="submit" value = "Go!"/>
</form>

<?php
    define('DEBUG', false);
    error_reporting(E_ALL);
    
    if (DEBUG)
    {
        ini_set('display_errors', 'On');
    }
    else
    {
        ini_set('display_errors', 'Off');
    }
    if(isset($_POST['artist']))
    {
        $artist = urlencode($_POST['artist']); // user input 'term' in a form
        $json =  file_get_contents('http://itunes.apple.com/search?term='.$artist.'&limit=25&media=music&entity=musicArtist,musicTrack,album,mix,song');
        $array = json_decode($json, true);
        $j = 0;
        foreach($array['results'] as $value)
        {
            for (; $j < 1 ; ++$j)
            {
                
                echo '<p>';
                echo $value['artistName'].'<br />';
                echo $value['primaryGenreName'].'<br />';
                $image = $value['artworkUrl100'];
                
                
                // Read image path, convert to base64 encoding
                $imageData = base64_encode(file_get_contents($image));
                
                // Format the image SRC:  data:{mime};base64,{data};
                $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                
                // Echo out a sample image
                echo '<img src="', $src, '">';
                echo '</p>';
            }
        }
    }
    ?> 

</div>
</div>
</head>
</html>
