<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel = "icon" type = "image/png" href = "Images/logo.png">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="wrapper">

    <div class="login">
        <h1>Login</h1>
        <h4>Vul deze formulier in te loggen.</h4>
        <?php
        if(isset($error_message))
        {
            echo '<label class="text-danger">'.$error_message.'</label>';
        }
        ?>
        <form action="clients_config_login.php" method="POST" name="myForm" autocomplete="off">
            <label>Email
                <input type="email" name="email" class="text-box" required>
            </label>
            <label>Wachtwoord
                <input type="password" name="wachtwoord" class="text-box"  required>
            </label>
            <button type="submit" name="login" onclick="submitForm()" id="login-btn-client">Login</button>
        </form>

        <p>Heb je nog geen account dan kun je hier<a href="Register.php" style="text-decoration: none; color: blue;"> Registreren.</a></p>
    </div>
</div>
<script type="text/javascript">
    function submitForm(){
        document.getElementsByName('email').value='';
        document.getElementsByName('wachtwoord').value='';
    }
</script>
</body>
</html>