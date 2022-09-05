<!-- This page is used for cancelling the order -->
<?php 
    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<?php
    if(!isset($_POST["cancel_order"])) { // If the users didnt click on the "cancel" button displayed in the table, they can not directly go to the page
        header("location:manager.php");
    } else {
        session_start();
        $order_id = $_POST["order_id_delete"]; // Get the order_id that need to be deleted
        require_once('settings.php');
	    $conn = @mysqli_connect($host,
		    $user,
		    $pwd,
		    $sql_db
	    );
  
	// Checks if connection is successful
	if (!$conn) {
		echo "<p>Database connection failure</p>";
	} else {		
	    $sql_table="orders";
		$query = "delete from $sql_table where order_id='$order_id'"; // Then delete the order according to the order_id
		$result = mysqli_query($conn, $query);
        session_start();
        $_SESSION["cancel"] = true; // Inform that the cancel is successfully
    }
    $page = $_POST["page"]; //Get the name from the page that submitting the form to cancel the order, then redirects base on the page's name
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
    }  else if ($page == "orders_between_two_dates") {
        header("location:orders_between_two_dates.php");
    }
}

?>