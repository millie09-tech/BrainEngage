<?php
session_start();

if(isset($_SESSION["username"])) {
    header("location:login_success.php");
}
require_once('config.php');
try
{
    $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbusername, $dbpassword);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST["login"]))
    {
        if(empty($_POST["username"]) || empty($_POST["password"]))
        {
            $message = '<label>All fields are required</label>';
        }
        else
        {
            $query = "SELECT * FROM users WHERE username = :username AND password = :password";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'username'     =>     $_POST["username"],
                    'password'     =>     $_POST["password"]
                )
            );
            $count = $statement->rowCount();
            if($count > 0)
            {
                $_SESSION["username"] = $_POST["username"];
                header("location:login_success.php");
            }
            else
            {
                $message = '<label>Incorrect username or password</label>';
            }
        }
    }
}
catch(PDOException $error)
{
    $message = $error->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>
<div id="header"><!--header file on top of each page -->
    <style>
        .nav-link{
            color:#ffffff; !important;
        }
        .nav-link:focus, .nav-link:hover {
            color: #212529; !important;
        }
        .body !important {
            font-family: Courier New;
        }
    </style>
    <div class="p-5" style="background-color:#1a3585">
        <img src="logo.png" width="100" height="100">
        <br><br><h3 style="font-family:'Courier New'; color:#ffffff">Brain Engage Portal</h3>
    </div>

</div>
<br />
<basefont face = "Courier New" >

<div class="container" style="width:500px;">
    <?php
    if(isset($message))
    {
        echo '<label class="text-danger" >'.$message.'</label>';
    }
    ?>
    <h3 align="" style="font-family:'Courier New';">Login:</h3><br />
    <form method="post">
        <label style="font-family:'Courier New';">Username</label>
        <input type="text" name="username" class="form-control" />
        <br />
        <label style="font-family:'Courier New'";>Password</label>
        <input type="password" name="password" class="form-control" />
        <br />
        <input type="submit" name="login" class="btn btn-info"  value="Login" />
    </form>
</div>
<br />

<?php include_once("footer.php"); ?>
</body>
</html>
