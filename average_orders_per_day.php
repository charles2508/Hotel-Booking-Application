<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "Description" content ="Display Average Number Of Orders"/>
    <meta name = "keyword" content="Average Number Of Orders"/>
    <meta name = "author" content ="Vu Thien Tri Phan"/>
    <title>Average Number Of Orders Per Day</title>
    <link rel="stylesheet" href = "styles/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)" />
    <script src="scripts/part2.js"></script>
    <script src="scripts/enhancements.js"></script>
</head>
<!-- This is an enhancement for providing a manager to query the average number of orders per day-->
<body>
    <div id="pages" class="all_but_footer">
        <?php
            include("header.inc");
        ?>
        <?php
            include("menu.inc");
        ?>
        <section>
            <h1 id="heading">Display Average Number Of Orders Per Day</h1>
        </section>
    <?php
    session_start();
    if (!isset($_POST["average_orders_per_day"])) {
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
        /* First, I calculate the total number of days in the table (by using the TIMESTAMPDIFF function with MAX,MIN in order to get the oldest and newest date in the table ) then I take the total number of orders divided by the total number of days and round the result up by 1 digit after decimal */
		$query = "select count(*) as total_orders,order_time, (TIMESTAMPDIFF(DAY,MIN(order_time),MAX(order_time)) + 1) as total_days, ROUND((1.0*count(*))/(TIMESTAMPDIFF(DAY,MIN(order_time),MAX(order_time)) +1),1) as avg_orders_per_day from $orders_table";
		$result = mysqli_query($conn, $query);
		if(!$result) {
			echo "<p>Something is wrong with ",	$query, "</p>";
		} else {
			echo "<table id='query'>\n";
                echo "<tr>\n "
                ."<th scope=\"col\">Total Orders</th>\n"
                ."<th scope=\"col\">Total Days</th>\n"
                . "<th scope=\"col\">Average Orders Per Days</th>\n"
                . "</tr>";
                while ($record = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n";
                    echo "<td>",$record["total_orders"],"</td>\n";
                    echo "<td>",$record["total_days"],"</td>\n";
                    echo "<td>",$record["avg_orders_per_day"],"</td>\n";
                    echo "</tr>\n";
                }
                echo "</table>\n";
			mysqli_free_result($result);
		}
		mysqli_close($conn);
	}
    }   
?>
    </div>
    <hr id='break'/>
    <?php 
        include("footer.inc");
    ?>
</body>
</html>