<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "Description" content ="Display Most Popular Orders"/>
    <meta name = "keyword" content="Most Popular Orders"/>
    <meta name = "author" content ="Vu Thien Tri Phan"/>
    <title>The Most Popular Orders</title>
    <link rel="stylesheet" href = "styles/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)" />
    <script src="scripts/part2.js"></script>
    <script src="scripts/enhancements.js"></script>
</head>
<!-- This is an enhancement for providing a manager to query which is the most popular product ordered-->
<body>
    <div id="pages" class="all_but_footer">
        <?php
            include("header.inc");
        ?>
        <?php
            include("menu.inc");
        ?>
        <section>
            <h1 id="heading">Display The Most Popular Orders</h1>
    <?php
    session_start();
    if (!isset($_POST["most_popular"])) { // If the manager doesnt click on the "Search" Button displayed in "most popular order" form, then he cant go to this page
        header("location: manager.php");
    } else {
        require_once('settings.php');
   	
	    $conn = @mysqli_connect($host,
		    $user,
		    $pwd,
		    $sql_db
	    );
	if (!$conn) {
        echo "<p>Database connection failure</p>"; 
	} else {		
	    $orders_table="orders";
        /* Create a column and name it as number_of_orders which counts the room_type (by grouping by room_type). This column will be sorted descending and then I get the row that has the highest figure in number_of_orders column. */
		$query = "select room_type ,count(room_type) as number_of_orders from $orders_table group by room_type order by number_of_orders desc limit 1";
		$result = mysqli_query($conn, $query);
		if(!$result) {
			echo "<p>Something is wrong with ",	$query, "</p>";
		} else {
			echo "<table id='query'>\n";
                echo "<tr>\n "
                . "<th scope=\"col\">Room Type</th>\n"
                ."<th scope=\"col\">Number of Orders</th>\n"
                . "</tr>";
                while ($record = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n";
                    echo "<td>",$record["room_type"],"</td>\n";
                    echo "<td>",$record["number_of_orders"],"</td>\n";
                    echo "</tr>\n";
                }
                echo "</table>\n";
			mysqli_free_result($result);
		}
		mysqli_close($conn);
	}
    }   
?>
        </section>
    </div>
    <hr id='break'/>
    <?php 
        include("footer.inc");
    ?>
</body>
</html>