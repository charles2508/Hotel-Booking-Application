<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name = "Description" content ="Enhancement 3 webpage"/>
        <meta name = "keyword" content="Hotel, Booking, Vietnam,Enhancement3"/>
        <meta name = "author" content ="Vu Thien Tri Phan"/>
        <title>Enhancements 3 Web Page</title>
        <link rel="stylesheet" href = "styles/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)" />
        <script src="scripts/part2.js"></script>
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
                <h1 id="heading">PHP ENHANCEMENTS OF THE WEBSITE</h1>
            <ol id="enhancements">
                <li class="list"> Manager Security
                    <ul class="describe-enhancement">
                        <li>In this enhancement, when the users go to the Manager webpage, they have to register an account first, then use that account to log in the webpage because the Manager webpage can not be accessed directly through URL. There is also a logout button that users could press to exit the Manager page.
                        This has gone beyond the requirements because this assignment only require creating the manager webpage without logging in by security account.</li>
                        <li>Firstly, I created the <strong>manager_registration.php</strong> page which enables the users to sign up their accounts. The username and password will be sent to the database and stored in the <strong>login table</strong>
                        (which is created when the first user account is registered).</li>
                        <li>Then I created the <strong>manager_login.php</strong> page which provides the form for the users to enter their own accounts (if they have already had ones). When the users enter the username and password, this page will 
                        check whether the username exists in the <strong>login table</strong> or not, if it exists, then check whether the password is correctly matched with that user's password stored in the table. </li>
                        <li>Lastly, I created the <strong>manager_logout.php</strong> page to <strong>unset()</strong> the SESSIONS initialized in the manager_login page, and redirect to the manager_login.php </li>
                        <li>I have learnt and edited the code base on a video on Youtube:<a href="https://www.youtube.com/watch?v=arqv2YVp_3E"><strong>Login system using PHP with MYSQL database.</strong></a></li>
                        <li>This is the link to where I have applied that enhancement to my website: <a href="manager_login.php"><strong>Login Manager</strong></a> and <a href="manager_registration.php"><strong>Sign Up Manager Account.</strong></a></li>
                    </ul>
                </li>
                <li class="list"> Advanced Manager Reports
                    <ul class="describe-enhancement">
                        <li>In this enhancement, the manager are provided with more advanced reports such as <strong>Finding the most popular product ordered</strong>, <strong>Showing all orders between two dates entered</strong> and <strong>Calculating the average number of orders per day</strong>.
                        These reports are not required in this assignments. In order to query these reports, I have to use some compound queries.</li>
                        <li>For <strong>finding the most popular product</strong>, I have to create a column and name it as <strong>number_of_orders</strong> which counts the room_type(products) by using <strong>count(room_type) and group by room_type field</strong>. This column will be sorted descending and then I get the row that
                        has the highest figure in the number_of_orders column.  </li>
                        <li>For <strong>selecting all orders between 2 input dates</strong>, I have firstly create a form for the manager to input 2 dates, then convert the <strong>order_time field</strong> into DATE type. After that, I selected all the orders that have the <strong>DATE(order_time)</strong> between the 2 entering dates.</li>
                        <li>And the for the last one which <strong>calculates the average number of orders per day</strong>, I began with calculating the total number of days in the table (by using the TIMESTAMPDIFF with MAX,MIN functions in order to get the oldest and newest date in the table ) then I take the total number of orders (get by using <strong>count(*) function</strong>) divided by the total number of days and round the result up by 1 digit after decimal.</li>
                        <li>I have learnt and edited the code base on the links:<a href="https://www.w3resource.com/mysql/date-and-time-functions/mysql-timestampdiff-function.php"><strong> MySQL TIMESTAMPDIFF function</strong></a> and <a href="https://www.tutorialspoint.com/retrieve-min-and-max-date-in-a-single-mysql-query-from-a-column-with-date-values"><strong>Retrieve MIN and MAX date in MYSQL</strong></a>.</li>
                        <li>This is the link to where I have applied that enhancement to my website: <a href="manager_login.php"><strong>Advanced Manager Reports.</strong></a> (Please log in by your manager account first).</li>
                    </ul>
                </li>
            </ol>
            <hr id="break"/>
            </section>
        </div>   
        <?php 
            include("footer.inc");
        ?>
    </body>
</html>
