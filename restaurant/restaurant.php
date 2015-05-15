<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Restaurants by Categories</title>
	<link rel="stylesheet" href="../css/style.css" />
	<style>

/* Navigation Style 
*********************/

ul.top-level { background: #81b395; 
}

ul.top-level li {
       border-bottom: #fff solid;
    border-top: #fff solid;
    border-width: 1px;
}

ul.sub-level { display: none; }

li:hover .sub-level {
    background: #999;
    border: #fff solid;
    border-width: 1px;
    display: block;
    position: absolute;
    left: 75px;
    top: 5px;
}

ul.sub-level li {
    border: none;
    float:left;
    width:250px; 
}

/*IE RESET HELPER
**********************/

li:hover .sub-level .sub-level { display:none; }
.sub-level li:hover .sub-level { display:block; }    

	</style>
</head>

<body>
<header>
	
		<hgroup>
   		  <a href="../home.html"><img id="logo" src="../images/headerLogo_editedmike.png" alt="Veia Logo"></a>
       	  <img id="bldg" src="../images/header_bldg_editedmike.png" alt="Building Logo">
       	  <img id="tagline" src="../images/headerTagLine.png" alt="Where restaurants live">
        	<a href="http://www.facebook.com" target="_blank"><img id="fbicon" src="../images/header_fbicon.png" alt="Facebook icon"></a>
    	    <a href="http://www.twitter.com" target="_blank"><img id="twittericon" src="../images/header_twittericon.png" alt="Twitter icon"></a>
		</hgroup>
           
		<nav>
			<ul> <!--Navigation-->
				<li><a href="../home.html">Home</a></li>
                <li><a href="restaurant.php">Categories</a></li>
				<li><a href="../list.php">List</a></li>
				<li><a href="../add.html">Add</a></li>
            	<li><a href="../aboutUs.html">About Us</a></li>
            	<li><a href="../blog.html">Blog</a></li>
   			</ul>
		</nav>
        <div id="customize">
			<p>Background</p>
            <ul>
				<li id="yellow"></li>
				<li id="white"></li>
				<li id="green"></li>
			</ul>
		</div>
        
</header>

<?php //login to the database

    $db_hostname = 'localhost';
    $db_database = 'group13db';
    $db_username = 'root';
    $db_password = 'root';
    
    $db_server = mysql_connect($db_hostname, $db_username, $db_password);
    if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
    
    mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());
    
?>

<div id="Restaurants">
<h1>Restaurants</h1>
</div>

<div id="RestaurantsNavigation">
    
    <?php include 'navigation.php' ?>
    
</div>

<div id="RestaurantsHeader">
    <?php 

    if (!$_GET[id]){
      $rest_number = 1;
     }

     else{
          $rest_number = $_GET[id];
     }

    $record_data="SELECT * from restaurant, review, image, link, item where restaurant.id = $rest_number and review.r_id = restaurant.id and image.r_id = restaurant.id and item.r_id = restaurant.id and link.r_id = restaurant.id;";
    
    $result = mysql_query($record_data) or die(mysql_error());
    
    $row = mysql_fetch_array($result);
    
    echo "<h2>$row[title]</h2>";
    echo "<h5>$row[address] | $row[city], $row[state] | $row[phone]</h5>";
    ?>

</div>
    
<div id="RestaurantsMain">
    
    <?php
    
    echo "<p id=\"RestaurantsFirstpara\">$row[paragraph1]</p><br />";
    echo "<p id=\"RestaurantsSecondpara\">$row[paragraph2]</p><br />";
	echo "<img src=\"$row[path1]\" alt=\"$row[alt1]\" id=\"RestaurantsFirstimg\" /><img src=\"$row[path2]\" alt=\"$row[alt2]\" id=\"RestaurantsSecondimg\" /><br />";
    
    ?>
</div>

<script src="../js/script.js"></script>
</body>
</html>