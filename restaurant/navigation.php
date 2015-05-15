 <?php 
    
    $db_server = mysql_connect($db_hostname, $db_username, $db_password);
    if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
    mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());

    $query="select distinct category.name, restaurant.category from restaurant, category where restaurant.category=category.id;";
    $result=mysql_query($query);
    if (!$result) die ("Database access failed: " . mysql_error());
    echo "<ul class=\"top-level\">";
    
    while ($category_row = mysql_fetch_array($result)){
        $restaurant_data="SELECT category, id, title from restaurant where category='$category_row[category]';";
        $restaurant_result = mysql_query($restaurant_data) or die(mysql_error());
        echo "<li><a href=\"category.php?cuisine=$category_row[category]\">$category_row[0]</a>";
        echo "<ul class=\"sub-level\">";
        
        while($restaurant_row=mysql_fetch_array($restaurant_result)){
            echo "<li><a href=\"restaurant.php?id=$restaurant_row[id]\">$restaurant_row[title]</a></li>";
        }
    echo "</ul></li>";
    }

    echo "</ul>";

?> 



