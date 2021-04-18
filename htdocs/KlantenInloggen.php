<?php
session_start();
require_once('Config.php');

if(isset($_POST['login']))
{
    if(isset($_POST['Email'],$_POST['Password']) && !empty($_POST['Email']) && !empty($_POST['Password']))
    {
        $email = trim($_POST['Email']);
        $password = trim($_POST['Password']);

        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $sql = "select * from bitfrost_loginsystem.clients_information where Email = Email ";
            $handle = $pdo->prepare($sql);
            $params = ['email'=>$email];
            $handle->execute($params);
            if($handle->rowCount() > 0)
            {
                $getRow = $handle->fetch(PDO::FETCH_ASSOC);
                if(password_verify($Password, $getRow['Password']))
                {
                    unset($getRow['Password']);
                    $_SESSION = $getRow;
                    header('location:dashboard.php');
                    exit();
                }
                else
                {
                    $errors[] = "Wrong Email or Password";
                }
            }
            else
            {
                $errors[] = "Wrong Email or Password";
            }

        }
        else
        {
            $errors[] = "Email address is not valid";
        }

    }
    else
    {
        $errors[] = "Email and Password are required";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Login als Klant</title>
</head>
    <body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <label>Gebruikersnaam
            <input class="Search" name="Email" type="text">
        </label><br>
        <label>Wachtwoord
            <input class="Search" name="Password" type="password">
        </label><br>
        <button type="submit" name="login">submit</button>
    </form>
    </body>
</html>