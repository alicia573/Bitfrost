
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login">
    <h1>Login</h1>
    <form action="clients_config.php" method="post">
        <label>Email
            <input type="email" name="email" class="text-box" >
        </label>
        <label>Wachtwoord
            <input type="password" name="wachtwoord" class="text-box">
        </label>
        <button type="submit" name="login">Login</button>
    </form>
    <p>Heb je nog geen account dan kun je<a href="Register.php" style="text-decoration: none; color: blue;"> registreren.</a></p>
</div>
</body>
</html>