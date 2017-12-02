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
		<li><a href= "admin.php">Admin</a></li>
		<li><a href="Delete.php">Delete</a></li>

    </ul>
  </div>
</head>

	<body>
		<p>Create Cruise:</p>
		<form method = "post">

			CruiseID: <input type="text" name="itemId" required><br>
			Cruise Name: <input type="text" name="cname" required><br>
			Room Number: <input type="text" name="rnumber" required><br>
			Availability: <input type="text" name="available" required><br>
			Cost: <input type="text" name="cost" required><br>
			Description: <textarea rows = "4" cols = "50" name="description" required></textarea><br>
			Room Capacity: <input type="text" name="rcapacity" required><br>
			From Location: <input type="text" name="flocation" required><br>
			Departure Date: <input type="text" name="ddate" required><br>
			Return Date: <input type="text" name="rdate" required><br>
			Duration <input type="text" name="duration" required><br>
			<br>
			<input type="submit" value="Create">
		</form>
	<?php
	  if($_SERVER["REQUEST_METHOD"] == "POST"){
		  $itemId = $_POST['itemId'];
		  $cname = $_POST['cname'];
		  $rnumber = $_POST['rnumber'];
		  $available = $_POST['available'];
		  $cost = $_POST['cost'];
		  $description = $_POST['description'];
		  $rcapacity = $_POST['rcapacity'];
		  $flocation = $_POST['flocation'];
		  $ddate = $_POST['ddate'];
		  $rdate = $_POST['rdate'];
		  $duration = $_POST['duration'];


		  $purchase_url = 'http://35.196.221.242:80/inventory/new/' . $itemId . '/' . $cname . '/' . $rnumber . '/' . $available . '/' . $cost . '/' . $cname . '/' . $description . '/' . $rcapacity . '/' . $flocation . '/' . $ddate . '/' . $rdate . '/' . $duration;
		  $ch = curl_init($purchase_url);
		  curl_setopt($ch, CURLOPT_POST, true);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  $response = curl_exec($ch);
		  echo $response;
	  }
	?>
</body>
</html>