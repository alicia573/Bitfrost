<?php
    session_start();
    $host = "localhost";
    $db_user = "root";
    $db_pass = "alicia573";
    $dbname = "bitfrost_loginsystem";
    $error_message = "";
try
{
    $connect = new PDO("mysql:host=$host; dbname=$dbname", $db_user, $db_pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST["login"]))
    {
        if(empty($_POST["username"]) || empty($_POST["wachtwoord"]))
        {
            $error_message = '<label>Vul de je inlog gegevens in.</label>';
        }
        else
        {
            $query = "SELECT * FROM medewerkers WHERE username = :username AND wachtwoord = :wachtwoord";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'username'     =>     $_POST["username"],
                    'wachtwoord'     =>     $_POST["wachtwoord"]
                )
            );
            $count = $statement->rowCount();
            if($count > 0)
            {
                $_SESSION["username"] = $_POST["username"];
                header("location:MedewerkerArea.php");
            }
            else
            {
                $error_message = 'Onjuiste Gegevens!';
            }
        }
    }
}
catch(PDOException $error)
{
    $error_message = $error->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Login als Mederwerker</title>
    </head>
    <body>
    <?php
    if(isset($error_message))
    {
        echo '<label class="text-danger">'.$error_message.'</label>';
    }
    ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Gebruikersnaam
                <input class="text-box" name="username" type="text">
            </label><br>
            <label>Wachtwoord
                <input class="text-box" name="wachtwoord" type="password">
            </label><br>
            <button type="submit" name="login">submit</button>
        </form>
    </body>
</html>