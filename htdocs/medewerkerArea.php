<?php
//Login Success.php
session_start();
if(isset($_SESSION["username"]))
{
    echo '<h2>Login Successfully</h2>';
    echo '<h4>Welcome - '.$_SESSION["username"].'</h4>';
    echo '<a href="Logout.php"><button type="button">Logout</button></a>';
}
else
{
    header("location:logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="">
    <title>Medewerker Area</title>

</head>
    <body>
    </body>
</html>