<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../style.css">
        <title>Medewerker Area</title>

    </head>
    <body>
        <div id="wrapper">
            <?php
            //Login Success.php
            session_start();
            if(isset($_SESSION["username"]))
            {
                echo '<h2>Medewerker Area</h2>';
                echo '<h4>Welcome - '.$_SESSION["username"].'</h4>';
                echo '<a href="../Logout.php"><button type="button">Logout</button></a>';
            }
            else
            {
                header("location:logout.php");
            }
            ?>
            <button id="buttonPost"><a href="postToClientArea.php">Post informatie voor klanten.</a></button>
            <button id="buttonClientsInformation"><a href="../clientsInformation.php">Klanten gegevens</a></button>

        </div>
    </body>
</html>