<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>List Restaurants</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
<header>
	
		<hgroup>
    		<a href="home.html"><img id="logo" src="images/headerLogo_editedmike.png" alt="Veia Logo"></a>
        	<img id="bldg" src="images/header_bldg_editedmike.png" alt="Building Logo">
        	<img id="tagline" src="images/headerTagLine.png" alt="Where restaurants live">
        	<a href="http://www.facebook.com" target="_blank"><img id="fbicon" src="images/header_fbicon.png" alt="Facebook icon"></a>
    	    <a href="http://www.twitter.com" target="_blank"><img id="twittericon" src="images/header_twittericon.png" alt="Twitter icon"></a>
		</hgroup>
           
		<nav>
			<ul> <!--Navigation-->
				<li><a href="home.html">Home</a></li>
                <li><a href="restaurant/restaurant.php">Categories</a></li>
				<li><a href="list.php">List</a></li>
				<li><a href="add.html">Add</a></li>
            	<li><a href="aboutUs.html">About Us</a></li>
            	<li><a href="blog.html">Blog</a></li>
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

<div id="ListRestaurant">
<h1>List Restaurants</h1>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<fieldset>
<legend>Search by city</legend>
	<ul>
		<li><input type="text" name="city" id="form-city" placeholder="City"></li>
        <p><input type="submit" value="Add"><input type="reset"></p>
    </ul>
</fieldset>
</form>
</div>

<div id="ListResultCity">
<?php

$user_input = $_POST['city'];

$restaurant_data = "SELECT * FROM restaurant WHERE city LIKE '%$user_input%';";
$restaurant_result = mysql_query($restaurant_data) or die(mysql_error());
$restaurant_totalresult = mysql_num_rows($restaurant_result);

echo "<span id=\"ListResultTotal\">$restaurant_totalresult results.</span>";
echo "<table id=\"ListResultTable\"><tr><th>Id</th><th>Restaurant</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Phone</th></tr>";

if ($restaurant_totalresult) {
	while($restaurant_row = mysql_fetch_array($restaurant_result)){
    	echo "<tr><td>$restaurant_row[id]</td><td>$restaurant_row[title]</td><td>$restaurant_row[address]</td><td>$restaurant_row[city]</td><td>$restaurant_row[state]</td><td>$restaurant_row[zip]</td><td>$restaurant_row[phone]</td></tr>";
        }
} else {
	echo "<tr><td colspan=\"7\">No results found.  Please try again.</td></tr>";
}

echo "</table>";
?>
</div>

<script src="js/script.js"></script>
</body>
</html>