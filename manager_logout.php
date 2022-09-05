<!-- This enhancement page will be processed when the manager clicks on the "Log out" button on manager page -->
<?php
    if (!isset($_POST['logout'])) {  // If the manager doesnt click on the "Log out" button, then this page can not be accessed
        header("location:manager_login.php");
    } else {
        unset($_SESSION['login_message']); //Unset(clear) the session's login_message when the manager logs out
        $_SESSION["login"] == "";
    }
?>