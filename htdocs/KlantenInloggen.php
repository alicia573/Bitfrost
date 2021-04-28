<!DOCTYPE html>
<html>
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
</div>
</body>
</html>