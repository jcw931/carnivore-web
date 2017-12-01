<?php
session_start();
	?>
<?php

	if ($_POST['location'] == "ms"){
		$service_url = 'http://35.196.221.242:80/inventory/location/Starkville,%20MS';
	}
	if ($_POST['location'] == "ga"){
		$service_url = 'http://35.196.221.242:80/inventory/location/Atlanta,%20GA';
	}
	if ($_POST['location'] == "al"){
		$service_url = 'http://35.196.221.242:80/inventroy/location/Huntsville,%20AL';
	}
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_URL, $service_url);
	$data = curl_exec($ch);
	curl_close($ch);
	$data = json_decode($data,true);
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
#portlocation select {
   -webkit-appearance: button;
   -webkit-border-radius: 2px;
   -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
   -webkit-padding-end: 20px;
   -webkit-padding-start: 2px;
   -webkit-user-select: none;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
   background-position: 97% center;
   background-repeat: no-repeat;
   border: 1px solid #AAA;
   color: #555;
   font-size: inherit;
   margin: 20px;
   overflow: hidden;
   padding: 5px 10px;
   text-overflow: ellipsis;
   white-space: nowrap;
   width: 300px;
}
#map{
    height:400px;
    width:75%
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
    <div id="image"> <img src="image2.jpg" width="1000" height="400" alt=""/> </div>
	<div id="portlocation">
    <form method = "post">
  	<select name = "location">
    	<option value = "">Select Port</option>
    	<option value ="ms">Starkville, MS</option>
    	<option value ="ga">Atlanta, GA</option>
		<option value = "al">Huntsville, AL</option>
  	</select>
	 <select name = "destination">
    	<option value = "">Select Destination</option>
    	<option value = "1">Honolulu, Hawaii</option>
    	<option value = "2">Spain, Italy</option>
		<option value = "3">Atlanta, GA</option>
  	</select>	
	<input type ="submit" value = " Go "/>
	</form>
    <div id="map"></div>	
    </div>
	  <div>
		  <p>
	  <?php 
			echo "<form action = \"cruises.php\" method = \"Post\">";
			  for ($i=0; $i <= count($data['inventory'])-1; $i++){
		echo ("Name: " . $data['inventory'][$i]['name']);
				  print("<br/>");
		echo ("Departure Date: " . $data['inventory'][$i]['departureDate']);
				   print("<br/>");
		echo ("Return Date: " . $data['inventory'][$i]['returnDate']);
				   print("<br/>");
		echo ("Room Capacity: " . $data['inventory'][$i]['roomCapacity']);
				   print("<br/>");
		echo ("Price: " . $data['inventory'][$i]['cost']);
		$cruiseId = $data['inventory'][$i]['itemID'];
				   print("<br/>");
		echo "Select " . "<input type = \"radio\" name = \"cruise\" value = \"$cruiseId\">";
				  print("<br/>");
				  print("<br/>");
	 }
			  ?></p>
		  <input type = "submit" name = "purchase" value = "Purchase">
		  </form>
	  <?php
	  if(isset($_POST['cruise'])){
		  $item = $_POST['cruise'];
		  $purchase_url = 'http://35.196.221.242:80/system/purchase/' . $item;
		  $ch = curl_init($purchase_url);
		  curl_setopt($ch, CURLOPT_PUT, true);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  $response = curl_exec($ch);
		  echo $response;
	  }
	  ?>
	  </div>
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

if(isset($_POST['location']))

{

	

	$location = $_POST['location'];

	if ($location == 'ms')

	{

		$lat = '33.458772';

		$lng = '-88.832629';

	}

	if ($location == 'ga')

	{

		$lat = '33.7490';

		$lng = '-84.3880';

	}

	if ($location == 'al')

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
