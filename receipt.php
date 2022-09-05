<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "Description" content ="Receipt order"/>
    <meta name = "keyword" content="Receipt Orders"/>
    <meta name = "author" content ="Vu Thien Tri Phan"/>
    <title>Receipt Order</title>
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
            <h1 id="heading">Order Receipt</h1>
        <?php
        session_start();
        if (!isset($_SESSION["result"])) { /* If the result hasnt been stored in the session (this means that the data hasnt been validated in process_order.php), then the users will be redirected to enquire page */
            header("location: enquire.php");
        } else {
            require_once('settings.php');
        
            $conn = @mysqli_connect($host,
                $user,
                $pwd,
                $sql_db
            );
    
        // Checks if connection is successful
        if (!$conn) {
                // Displays an error message
            echo "<p>Database connection failure</p>"; // Might not show in a production script 
        } else {		
            $sql_table="orders";
            $fname = $_SESSION['firstname'];
            //Get the newest record stored in the orders table
            $query = "select order_id, order_cost, order_time, order_status from $sql_table ORDER BY order_id DESC LIMIT 1 ";
                
            // execute the query and store result into the result pointer
            $result = mysqli_query($conn, $query);
            
            // checks if the execution was successful or not
            if(!$result) {
                echo "<p>Something is wrong with ",	$query, "</p>";
            } else {
                // Display the retrieved records
                echo "<table id='query'>";
                echo "<thead>";
                echo "<tr>\n"
                    ."<th scope=\"col\">Fields</th>\n"
                    ."<th scope=\"col\">Value</th>\n"
                    ."</tr>\n";
                echo "</thead>";
                echo "<tbody>";
                // retrieve current record pointed by the result pointer
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n";
                    echo "<td>Order ID</td>\n";
                    echo "<td>",$row["order_id"],"</td>\n";
                    echo "</tr>";
                    // I use these Session storage variables which are initialized in process_order page in order to sent data from process_order.php to this receipt page
                    echo "<tr>\n";
                    echo "<td>First name</td>\n";
                    echo "<td>",$_SESSION["firstname"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Last name</td>\n";
                    echo "<td>",$_SESSION["lastname"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Email</td>\n";
                    echo "<td>",$_SESSION["email"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Street Address</td>\n";
                    echo "<td>",$_SESSION["streetAddress"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>suburb</td>\n";
                    echo "<td>",$_SESSION["suburb"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>State</td>\n";
                    echo "<td>",$_SESSION["state"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Postcode</td>\n";
                    echo "<td>",$_SESSION["postcode"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Phone number</td>\n";
                    echo "<td>",$_SESSION["phonenum"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Preferred contact</td>\n";
                    echo "<td>",$_SESSION["contact"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Room Type</td>\n";
                    echo "<td>",$_SESSION["roomtype"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Extra Options</td>\n";
                    echo "<td>",$_SESSION["extraOptions"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Optional Features</td>\n";
                    echo "<td>",$_SESSION["optionalFeatures"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Number of beings</td>\n";
                    echo "<td>",$_SESSION["partySize"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Days Of Travelling</td>\n";
                    echo "<td>",$_SESSION["daysOfTravelling"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Credit Card Type</td>\n";
                    echo "<td>",$_SESSION["cardtype"],"</td>\n";
                    echo "</tr>";

                    $cardNameLength = strlen($_SESSION["cardname"]); // Get the length of the card name in order to print the *
                    echo "<tr>\n";
                    echo "<td>Credit Card Name</td>\n";
                    echo "<td>";
                    for($i=0; $i < $cardNameLength ; $i++) {
                        echo "*"; //Print *
                    }
                    echo "</td>\n";
                    echo "</tr>";

                    $cardNumLength = strlen($_SESSION["cardnumber"]); // Get the length of the card number in order to print the *
                    echo "<tr>\n";
                    echo "<td>Credit Card Number</td>\n";
                    echo "<td>";
                    for($i=0; $i < $cardNumLength - 3 ; $i++) { //I want to print 12-13 stars
                        echo "*"; //Print *
                    }
                    echo substr($_SESSION["cardnumber"],$cardNumLength-3); // And the last 3 card numbers will be printed
                    echo "</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Expiry Date</td>\n";
                    echo "<td>*****</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Card Verification Value</td>\n";
                    echo "<td>***</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Comment</td>\n";
                    echo "<td>",$_SESSION["comment"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Total Order Cost</td>\n";
                    echo "<td>","$",$row["order_cost"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Ordering Date</td>\n";
                    echo "<td>",$row["order_time"],"</td>\n";
                    echo "</tr>";

                    echo "<tr>\n";
                    echo "<td>Ordering Status</td>\n";
                    echo "<td>",$row["order_status"],"</td>\n";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                mysqli_free_result($result);
            }
            mysqli_close($conn);
        }
        }   
    ?>
        <hr id='break'/>
        </section>
    </div>
    <?php 
        include("footer.inc");
    ?>
    <?php
        unset($_SESSION["result"]); /*Unset the result in the session when get to this page */
    ?>
</body>
</html>