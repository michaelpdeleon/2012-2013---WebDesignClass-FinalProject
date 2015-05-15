<?php 
    
	//login to the database

    $db_hostname = 'localhost';
    $db_database = 'group13db';
    $db_username = 'root';
    $db_password = 'root';
    
    $db_server = mysql_connect($db_hostname, $db_username, $db_password);
    if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
    
    mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());
	
	$restaurant = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	$category = $_POST['category'];	

    $query="INSERT INTO restaurant (title, address, city, state, zip, phone, category) 
	VALUES ('$_POST[name]','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[zip]','$_POST[phone]','$_POST[category]')";
    $result=mysql_query($query);
    if (!$result) die ("Database access failed: " . mysql_error());
	
	if ($category == 0)
		$category_name = "American";
	else if ($category == 1)
		$category_name = "Mexican";
	else if ($category == 2)
		$category_name = "Italian";
	else if ($category == 3)
		$category_name = "Asian";
	else if ($category == 4)
		$category_name = "Mediterranean";
	else if ($category == 5)
		$category_name = "Pizza";
	else if ($category == 6)
		$category_name = "Burgers";
	else if ($category == 7)
		$category_name = "Sandwiches";
	else if ($category == 8)
		$category_name = "Dessert";
	else if ($category == 9)
		$category_name = "Other";
    
	echo "<!DOCTYPE html>";
	echo "<html>";
	echo "<head>";
	echo "<meta charset=\"UTF-8\" />";
	echo "<title>Successfully Added A Restaurant</title>";
	echo "<link rel=\"stylesheet\" href=\"css/style.css\" />";
	echo "</head>";
	echo "<body>";
	echo "<header>";
	echo "<hgroup>";
	echo "<a href=\"home.html\"><img id=\"logo\" src=\"images/headerLogo_editedmike.png\" alt=\"Veia Logo\"></a>";
	echo "<img id=\"bldg\" src=\"images/header_bldg_editedmike.png\" alt=\"Building Logo\">";
	echo "<img id=\"tagline\" src=\"images/headerTagLine.png\" alt=\"Where restaurants live\">";
	echo "<a href=\"http://www.facebook.com\" target=\"_blank\"><img id=\"fbicon\" src=\"images/header_fbicon.png\" alt=\"Facebook icon\"></a>";
	echo "<a href=\"http://www.twitter.com\" target=\"_blank\"><img id=\"twittericon\" src=\"images/header_twittericon.png\" alt=\"Twitter icon\"></a>";
	echo "</hgroup>";
	echo "<nav>";
	echo "<ul> <!--Navigation-->";
	echo "<li><a href=\"home.html\">Home</a></li>";
	echo "<li><a href=\"restaurant/restaurant.php\">Categories</a></li>";
	echo "<li><a href=\"list.php\">List</a></li>";
	echo "<li><a href=\"add.html\">Add</a></li>";
	echo "<li><a href=\"aboutUs.html\">About Us</a></li>";
	echo "<li><a href=\"blog.html\">Blog</a></li>";
	echo "</ul>";
	echo "</nav>";
	echo "<div id=\"customize\">";
	echo "<p>Background</p>";
	echo "<ul>";
	echo "<li id=\"yellow\"></li>";
	echo "<li id=\"white\"></li>";
	echo "<li id=\"green\"></li>";
	echo "</ul>";
	echo "</div>";
	echo "</header>";
	echo "<div id=\"AddARestaurantSuccess\">";
    echo "<h1>Successfully added a new restaurant:</h1>";
    echo "<p><b>Restaurant:</b> $restaurant</p>";
	echo "<p><b>Address</b>: $address</p>";
	echo "<p><b>City:</b> $city</p>";
	echo "<p><b>State:</b> $state</p>";
	echo "<p><b>Zip:</b> $zip</p>";
	echo "<p><b>Phone:</b> $phone</p>";
	echo "<p><b>Category:</b> $category_name</p>";
	echo "</div>";
	echo "<script src=\"js/script.js\"></script>";
	echo "</body>";
	echo "</html>";

?> 
