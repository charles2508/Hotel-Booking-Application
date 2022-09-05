<!-- This page is used for updating the status of the order -->
<?php 
    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<?php
    if(!isset($_POST["update_status"])) {
        header("location:manager.php");
    } else {
        session_start();
        $new_status = $_POST["new_status"]; // Get the new status entered from the form in the table which displays manager's queries
        $new_status = sanitise_input($new_status);
        $order_id = $_POST["order_id"]; // Get the order id from the hidden input submitted from the form inside the tables which display manager's queries
        $_SESSION['order_id'] = $order_id;
        if ($new_status != "PENDING" && $new_status != "FULFILLED" && $new_status != "PAID" && $new_status != "ARCHIVED") {
            $_SESSION["message"] = "Invalid Order Status"; //Update and Store the message in the session storage, this message then be displayed back in the table
        } else {
            $_SESSION["message"] = "Update successfully!";
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
        //Update the status of the record base on order id
		$query = "update $sql_table set order_status='$new_status' where order_id='$order_id'";
		// execute the query and store result into the result pointer
		$result = mysqli_query($conn, $query);
		
		// checks if the execution was successful or not
		if(!$result) {
			echo "<p>Something is wrong with ",	$query, "</p>";
		} else {
            echo "<p>Successfully</p>";
        }
    }
        }
    $page = $_POST["page"]; //Get the name from the page that submitting the form to update the status, then redirects base on the page's name
    if ($page == "all_orders") {
        header("location:all_orders.php");
    } else if ($page == "orders_by_name") {
        header("location:orders_by_name.php");
    } else if ($page == "orders_by_product") {
        header("location:orders_by_product.php");
    } else if ($page == "orders_by_cost") {
        header("location:sorted_cost_orders.php");
    } else if ($page == "pending") {
        header("location:pending_orders.php");
    } else if ($page == "orders_between_two_dates") {
        header("location:orders_between_two_dates.php");
    }
}   
?>