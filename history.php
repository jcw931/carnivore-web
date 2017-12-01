<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>history</title>
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
</head>
	<?php
	$service_url = 'http://35.196.221.242:80/system/history';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_URL, $service_url);
	$data = curl_exec($ch);
	curl_close($ch);
	$data = json_decode($data,true);
	
	?>
	<p>
	  <?php 
			  for ($i=0; $i <= count($data['history']) -1; ++$i){
		echo ("Name: " . $data['history'][$i]['itemId']);
				  print("<br/>");
		echo ("Number sold: " . $data['history'][$i]['numberSold']);
				  print("<br/>");
				  print("<br/>");

	 }
			  ?></p>
	<p>Total Revenue: 3512.35</p>
<body>
</body>
</html>