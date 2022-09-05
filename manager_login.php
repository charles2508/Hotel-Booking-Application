<!-- This page is used for processing the login of the manager -->
<?php 
    session_start();
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
    <meta name = "Description" content ="Manager Login"/>
    <meta name = "keyword" content="Manager Login Page"/>
    <meta name = "author" content ="Vu Thien Tri Phan"/>
    <title>Manager Login Webpage</title>
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
            <h1 id="heading">Log In As Manager</h1>
        <?php
            $_SESSION["login_message"] = ""; // First, I will reset the login_message and the login boolean to be false
            $_SESSION["login"] = false;
            if (isset($_POST['login'])) { // When the manager clicks on the "login" button of this page (below), then login process will be validated (checked)
                require_once("settings.php");
                $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                if (!$conn) {
                    echo "<p>Database connection failure</p>";
                } else {
                    $table = "login";
                    //Get the login name and password
                    $login_name = $_POST["login_name"];
                    $login_password = $_POST["login_password"];
                    $login_name = sanitise_input($login_name);
                    $login_password = sanitise_input($login_password);
                    $query = "select username,password from $table where username='$login_name'";
                    $result = @mysqli_query($conn,$query);
                    if (mysqli_num_rows($result) == 0) { // If there doesnt exist a login_name on login table
                        $_SESSION['login_message'] = "Invalid username"; //The login message will notice that the username is invalid
                    } else {
                        $record = mysqli_fetch_assoc($result);
                        if ($login_password == $record['password']) { // If the login name exists, then check the login password whether it matches that user's password stored in the table or not.
                            header("location:manager.php"); // If matches, the user can access the manager page
                            $_SESSION["login"] = true;
                        } else {
                            $_SESSION['login_message'] = "Wrong password"; // Else, display error message
                        }
                    }
                }
            }
        ?>
        <!-- Here is the form that allows the user to enter username and password, this form will be sent and processed to it self page-->
        <form method="post" action="manager_login.php">
            <p>
            <label for='username'>User Name:</label>
            <input type='text' id='username' name='login_name'/>
            </p>
            <p>
            <label for='password'>Password:</label>
            <input type='password' id='password' name='login_password'/>
            <input type="checkbox" id="show_password"/>
            <label for="show_password">Show Password</label>
            </p>
            <?php 
                if (isset($_SESSION["login_message"])) {
                    if (!$_SESSION["login"]) {
                        echo "<p class='error'>".$_SESSION['login_message']."</p>";
                    }
                }
            ?>  
            <input type='submit' id="submit" name='login' value='Log In' class='button'/>
        </form>
        <form method="post" action="manager_registration.php"> <!-- Sign up button-->
            <input type='submit' name="register" value="Sign Up" class="button"/>
        </form>
        </section>
    </div>
    <hr id='break'/>
    <?php 
        include("footer.inc");
    ?>
</body>
</html>