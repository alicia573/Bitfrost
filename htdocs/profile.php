<?php  session_start();
if(empty($_SESSION['email']))
{
    header("location:index2.html");
}

?>

Welkom <?php echo $_SESSION['voornaam']; ?>

<a href="Logout.php">Logout</a>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Home</title>
    </head>
    <body>
        <div id="wrapper">

        </div>
    </body>
</html>