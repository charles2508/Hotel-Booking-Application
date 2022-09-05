<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "Description" content ="Manager Queries"/>
    <meta name = "keyword" content="Manager Webpage"/>
    <meta name = "author" content ="Vu Thien Tri Phan"/>
    <title>Managers Order Report And Order Update</title>
    <link rel="stylesheet" href = "styles/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)" />
    <script src="scripts/part2.js"></script>
    <script src="scripts/enhancements.js"></script>
</head>
<body>
    <?php
        session_start();
        // If the user hasnt logged in by manager's account or the login fail, then the user can not access to this manager page
        if (!isset($_SESSION['login'])) {
            header("location:manager_login.php");
        } else {
            if (!$_SESSION['login']) {
                header("location:manager_login.php");
            }
        }
    ?>
    <div id="pages" class="all_but_footer">
    <?php
            include("header.inc");
        ?>
        <?php
            include("menu.inc");
        ?>
        <section>
            <h1 id="heading">Managers Order Report And Order Update</h1>
        <!-- These below form will be sent to different php pages in order to process and show table data -->
        <!--All Orders-->
        <form method="post" action="all_orders.php">
            <h2>Display All Orders</h2>
            <input type='submit' name = 'search_all' value='Search' class='button'/>
        </form>
        <!--Orders for a customer based on their name-->
        <form method="post" action="orders_by_name.php">
            <h2>Display Orders For A Customer Based On Name</h2>
            <p>
            <label for="name">Full Name: </label>
			<input type="text" name="search_by_name" id="name"/>
            </p>
            <input type='submit' name = 'search' value='Search' class='button'/>
        </form>
        <!--Orders for a particular product-->
        <form method="post" action="orders_by_product.php">
            <h2>Display Orders For A Particular Room Type</h2> 
            <p>
            <label for="search_room_type">Room Type: </label>
			<input type="text" name="search_room_type" id="search_room_type"/>
            </p>
            <input type='submit' name = 'search' value='Search' class='button'/>
        </form>
        <!--Pending Orders-->
        <form method="post" action="pending_orders.php">
            <h2>Display Pending Orders</h2> 
            <input type='submit' name = 'pending_orders' value='Search' class='button'/>
        </form>
        <!--Orders Sorted By Total Cost-->
        <form method="post" action="sorted_cost_orders.php">
            <h2>Display Orders Sorted By Total Cost</h2> 
            <input type='submit' name = 'sorted_cost' value='Search' class='button'/>
        </form>

        <!-- 3 Below are Enhancement Reports --> 
        <form method="post" action="most_popular_product.php">
            <h2>Display The Most Popular Product Ordered</h2> 
            <input type='submit' name = 'most_popular' value='Search' class='button'/>
        </form>
        <form method="post" action="orders_between_two_dates.php">
            <h2>Display The Orders Purchased Between Two Dates Entered</h2> 
            <p>
            <label for="first_date">First Date</label>
            <input type="text" name="first_date" id="first_date" pattern="\d{4}-\d{2}-\d{2}" placeholder="yyyy-mm-dd"/>
            <label for="last_date">Last Date</label>
            <input type="text" name="last_date" id="last_date" pattern="\d{4}-\d{2}-\d{2}" placeholder="yyyy-mm-dd"/>
            </p>
            <input type='submit' name='orders_between_two_dates' value='Search' class='button'/>
        </form>
        <form method="post" action="average_orders_per_day.php">
            <h2>Display The Average Number Of Orders Per Day</h2> 
            <input type='submit' name='average_orders_per_day' value='Search' class='button'/>
        </form>
        <form method="post" action="manager_login.php">
            <input type='submit' name='logout' value='Log Out' class='button'/>
        </form>
        </section>
    </div>
    <hr id='break'/>
    <?php 
        include("footer.inc");
    ?>
</body>
</html>