<?php
session_start();
	?>
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
#map{
    height:400px;
    width:75%;
}
</style>
<div id="Container">
  <div id="navBar">
    <ul>
      <li><a href="carnivoreCruise.php">Home</a></li>
      <li><a href="cruises.php">Cruises</a></li>
      <li><a href="artist.php">Featured Artist</a></li>
      <li><a href="about.asp">About</a></li>
    </ul>
  </div>
  <div id="body">
	  <div id="map"></div>
	</div>
	</div>
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

$lat = '';

$lng = '';



if(isset($_SESSION['Location'])){

$location = $_SESSION['Location'];
	if ($location == "Starkville, MS"){
		$service_url = 'http://35.196.221.242/inventory/location/Starkville,%MS';
	}
	if ($location == "Atlanta, GA"){
		$service_url = 'http://35.196.221.242:80/inventory/location/Atlanta,%MS';
	}
	if ($location == "Huntsville, AL"){
		$service_url = 'http://35.196.221.242:80/inventroy/location/Huntsville,%AL';
	}
	echo $service_url;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_URL, $service_url);
	$data = curl_exec($ch);
	curl_close($ch);
	echo $data;
	

if ($location == "Starkville, MS")
{
	$lat = '33.458772';

	$lng = '-88.832629';
}
	if ($location == "Atlanta, GA")
	{
		$lat = '33.7490';

		$lng = '-84.3880';

	}

	if ($location == "Huntsville, AL")

	{

		$lat = '34.7304';

		$lng = '-86.5861';

	}

}

 echo <<<_END

    <script>

      function myMap() {

        var uluru = {lat: $lat, lng: $lng};

        var map = new google.maps.Map(document.getElementById('map'), {

          zoom: 11,

          center: uluru

        });

        var marker = new google.maps.Marker({

          position: uluru,

          map: map

        });

    }

_END;

?>

    </script>

    <script async defer

    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBNYvgALeNe2cJgXVKeClwuyERAN58wNA&callback=myMap">

    </script>
	

	</head>
</html>
