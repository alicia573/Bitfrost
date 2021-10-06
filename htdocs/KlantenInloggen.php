<?php
include_once "clients_config_login.php";
if(!$select){
?>
<body>
error
</body>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="wrapper">

    <div class="login">
        <h1>Login</h1>
        <h4>Vul deze formulier in te loggen.</h4>
        <form action="clients_config_login.php" method="POST">
            <label>Email
                <input type="email" name="email" class="text-box" >
            </label>
            <label>Wachtwoord
                <input type="password" name="wachtwoord" class="text-box">
            </label>
            <button type="submit" name="login" id="login-btn-client">Login</button>
        </form>
        <p>Heb je nog geen account dan kun je hier<a href="Register.php" style="text-decoration: none; color: blue;"> Registreren.</a></p>
    </div>
</div>

</body>
</html>