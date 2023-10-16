<?php
//login_success.php
session_start();
if(isset($_SESSION["username"]))
{
    header("location:home_directory.php");

    //echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>';
    //echo '<br /><br /><a href="logout.php">Logout</a>';
}
else
{
    header("location:login.php");

}
?>
