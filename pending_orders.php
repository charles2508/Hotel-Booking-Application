<!--Displaying Orders that are pending-->
<?php 
    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "Description" content ="Display Pending Orders"/>
    <meta name = "keyword" content="Pending Orders"/>
    <meta name = "author" content ="Vu Thien Tri Phan"/>
    <title>Pending Orders</title>
    <link rel="stylesheet" href = "styles/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)" />
    <script src="scripts/part2.js"></script>
    <script src="scripts/enhancements.js"></script>
</head>
<body>
    <div id="pages" class="all_but_footer">
        <?php
            include("header.inc");
        ?>
        <?php
            include("menu.inc");
        ?>
        <section>
            <h1 id="heading">Display Pending Orders</h1>
        <?php
        session_start();
        if (!isset($_POST["pending_orders"]) && ($_SESSION["message"] == "") && !$_SESSION["cancel"]) { /* If the user hasnt clicked on the "search" button in the "Display Pending Orders" form AND there isnt any message returned from the update_status.php page AND the user hasnt clicked on the "Cancel" Button, then the user can not go to this page! */
            header("location: manager.php");
        } else {
            if (isset($_POST["pending_orders"])) { /* If the user click on the "search" button on manager page, the message and order id stored in the session in update_status.php page will be reseted*/
                $_SESSION["order_id"] = -1;  /*   If the user clicks on the "search" button on manager page, the order id stored in the session in update_status.php page will be set to be -1*/
            }
            $order_id = $_SESSION["order_id"]; /* Get the order id and message stored in the session by update_status.php page*/
            $message = $_SESSION["message"];
            $_SESSION["message"] = ""; /*  After getting the message stored in the session, that session variable will be set to be null*/
            $_SESSION["cancel"] = false; // The cancel boolean will also be reseted to be false
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
		    $query = "select order_id, fname, lname, room_type, extra_options, optional_features, partysize, days_travelling, order_time, order_cost, order_status from $orders_table where order_status='PENDING'";
			
		    // execute the query and store result into the result pointer
		    $result = mysqli_query($conn, $query);
		    if(!$result) {
			    echo "<p>Something is wrong with ",	$query, "</p>";
		    } else {
			    // Display the retrieved records
			    echo "<table id='query'>\n";
                    echo "<tr>\n "
                    . "<th scope=\"col\">Order ID</th>\n"
                    . "<th scope=\"col\">First Name</th>\n"
                    . "<th scope=\"col\">Last Name</th>\n"
                    . "<th scope=\"col\">Room Type</th>\n"
                    . "<th scope=\"col\">Extra Options</th>\n"
                    . "<th scope=\"col\">Optional Features</th>\n"
                    . "<th scope=\"col\">Party Size</th>\n"
                    . "<th scope=\"col\">Days Of Travelling</th>\n"
                    . "<th scope=\"col\">Order Date</th>\n"
                    . "<th scope=\"col\">Order Cost</th>\n"
                    . "<th scope=\"col\">Order Status</th>\n"
                    ."<th scope=\"col\">Update Status</th>\n"
                    ."<th scope=\"col\">Cancel Order</th>\n"
                    . "</tr>";
                    while ($record = mysqli_fetch_assoc($result)) {
                        echo "<tr>\n";
                        echo "<td>",$record["order_id"],"</td>\n";
                        echo "<td>",$record["fname"],"</td>\n";
                        echo "<td>",$record["lname"],"</td>\n";
                        echo "<td>",$record["room_type"],"</td>\n";
                        echo "<td>",$record["extra_options"],"</td>\n";
                        echo "<td>",$record["optional_features"],"</td>\n";
                        echo "<td>",$record["partysize"],"</td>\n";
                        echo "<td>",$record["days_travelling"],"</td>\n";
                        echo "<td>",$record["order_time"],"</td>\n";
                        echo "<td>",$record["order_cost"],"</td>\n";
                        echo "<td>",$record["order_status"],"</td>\n";
                        echo "<td>";
                        //These 2 below forms I have described and explained in all_orders.php page
                        echo "<form method='post' action='update_status.php'>
                        <input type='hidden' name= 'order_id' value=",$record["order_id"],">
                        <input type='hidden' name= 'page' value='pending'>
                        <label>New Status:
                        <input type='text' name='new_status'/>
                        </label>
                        <input type='submit' name='update_status' value='Update' class='button'/>";
                        if ($_SESSION['order_id'] == $record['order_id']) {
                            echo "<p>$message</p>";
                        }
                        echo "</form>";
                        echo "</td>";
                        echo "<td>";
                        if ($record["order_status"] == "PENDING") {
                            echo "<form method='post' action='cancel_order.php'>
                            <input type='hidden' name= 'order_id_delete' value=",$record["order_id"],">
                            <input type='hidden' name= 'page' value='pending'>
                            <input type='submit' name='cancel_order' value='Cancel Order' class='button'/>
                            </form>";
                        }
                        echo "</td>";
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