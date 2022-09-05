<!-- This page allow the user to create a manager's account -->
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
    <meta name = "Description" content ="Manager Registration"/>
    <meta name = "keyword" content="Manager Sign up"/>
    <meta name = "author" content ="Vu Thien Tri Phan"/>
    <title>Manager Sign Up Webpage</title>
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
            <h1 id="heading">Registration</h1>
        <?php
            session_start();
            if(isset($_POST["register"])) { /* When the user clicks on the "Sign Up" button (on the manager_login page), 
                  all information about the username,password, confirm password stored in the session will be unseted*/
                unset($_SESSION["signup_error"]);
                unset($_SESSION["username_error"]);
                unset($_SESSION["password_error"]);
                unset($_SESSION["confirm_password_error"]);
                unset($_SESSION["signup"]);
                unset($_SESSION["username"]);
                unset($_SESSION["password"]);
                unset($_SESSION["confirm_password"]);
             }
        ?>
        <?php   
            if(isset($_POST["signup"])) { // If the user clicks on the "Sign Up" Button (on the form below), these session variables will be initialized
                $_SESSION["signup_error"] = "";
                $_SESSION["username_error"] = "";
                $_SESSION["password_error"] = "";
                $_SESSION["confirm_password_error"] = "";
                $_SESSION["signup"] = true;
                $_SESSION["username"] = true;
                $_SESSION["password"] = true;
                $_SESSION["confirm_password"] = true;
                require_once("settings.php");
                $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                if (!$conn) {
                    echo "<p>Database connection failure</p>";
                } else {
                    // Get username, password and confirm_password from the form below and sanitise these
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $confirm_password = $_POST["confirm_password"];
                    $username = sanitise_input($username);
                    $password = sanitise_input($password);
                    $confirm_password = sanitise_input($confirm_password);
                    // Check validation for the username,password and confirm password
                    if (!preg_match('/^[a-zA-Z_0-9]{1,30}$/',$username)) {
                        $_SESSION["username"] = false;
                        $_SESSION["username_error"] = "Username must be signed up with alphanumeric or underscore(_) only with maximum of 30 characters.\n";
                    }
                    if (!preg_match('/^[a-zA-Z0-9]{1,30}$/',$password)) {
                        $_SESSION["password"] = false;
                        $_SESSION["password_error"] = "Password must be signed up with alphabetical or numbers with maximum of 30 characters.\n";
                    }
                    if ($confirm_password !== $password) {
                        $_SESSION["confirm_password"] = false;
                        $_SESSION["confirm_password_error"] .= "Confirm password must be identical to your password.\n";
                    }
                    if ($_SESSION["username"]  && $_SESSION["password"] &&  $_SESSION["confirm_password"]) { // If all username, password and confirm password are correct, then the manager's account will be created
                        $table = "login";
                        $sqlString = "show tables like '$table'"; // Check if the login table exists or not.
                        $fieldDefinition = "id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(30), password VARCHAR(30)";
                        $result = @mysqli_query($conn, $sqlString);
                        if (mysqli_num_rows($result)==0) { // If the table hasnt existed, create it!
                            $sqlString = "create table ". $table . "(" . $fieldDefinition . ")";
                            $result2 = @mysqli_query($conn,$sqlString);
                        }
                        // Then check whether the username has already existed in the table or not, if exists, the account wont be created!
                        $query = "select username,password from $table where username='$username'";
                        $result = @mysqli_query($conn,$query);
                        if (mysqli_num_rows($result) == 0) { // If the username hasnt existed in the table, then the username and password will be inserted into the login table
                            $query = "insert into $table (username, password) values ('$username','$password')";
                            $result = @mysqli_query($conn,$query);
                            if ($result) {
                                //After inserting data, reset all the session variables used in this page and redirect to the manager_login page
                                $_SESSION["signup_error"] = "";
                                $_SESSION["username_error"] = "";
                                $_SESSION["password_error"] = "";
                                $_SESSION["confirm_password_error"] = "";
                                $_SESSION["signup"] = true;
                                $_SESSION["username"] = true;
                                $_SESSION["password"] = true;
                                $_SESSION["confirm_password"] = true;
                                header("location:manager_login.php");
                            }
                        } else {
                            $_SESSION["signup"] = false;
                            $_SESSION["signup_error"] = "This user account already exists";
                        } 
                    }
                }
            }
        ?>
        <form method="post" action="manager_registration.php">
            <p>
            <label for='username'>User Name:</label>
            <input type='text' id='username' name='username'/>
            <?php
                // If there is any any error when creating the username,password or confirm password, the error messages will be displayed
                if (isset($_SESSION["username"])){
                    if (!$_SESSION["username"]) {
                        echo "<p class='error'>".$_SESSION['username_error']."</p>";
                    }
                }   
            ?>
            </p>
            <p>
            <label for='password'>Password:</label>
            <input type='password' id='password' name='password'/>
            <input type="checkbox" id="show_password"/>
            <label for="show_password">Show Password</label>
            </p>
            <?php
                if (isset($_SESSION["password"])) {
                    if (!$_SESSION["password"]) {
                        echo "<p class='error'>".$_SESSION["password_error"]."</p>";
                    }
                }
            ?>
            <p>
            <label for='confirm_password'>Confirm Password:</label>
            <input type='password' id='confirm_password' name='confirm_password'/>
            <input type="checkbox" id="show_confirm_password"/>
            <label for="show_confirm_password">Show Password</label>
            </p>
            <?php
                if (isset($_SESSION["confirm_password"])) {
                    if (!$_SESSION["confirm_password"]) {
                        echo "<p class='error'>".$_SESSION["confirm_password_error"]."</p>";
                    }
                }
            ?>
            <input type='submit' name = 'signup' value='Sign Up' class='button'/>
            <?php
                if (isset($_SESSION["signup"])) {
                    if (!$_SESSION["signup"]) {
                        echo "<p class='error'>".$_SESSION["signup_error"]."</p>";
                    }
                }
            ?>
        </form>
        </section>
    </div>
    <hr id='break'/>
    <?php 
        include("footer.inc");
    ?>
</body>
</html>