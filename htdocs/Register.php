<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_database = "registration_pdo";

$voornaam=$_POST['voornaam'];
$last_name=$_POST['achternaam'];
$user_name=$_POST['user_name'];
$password1=$_POST['password'];

$conn = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO  (first_name, last_name, user_name, password)
VALUES ('$first_name', '$last_name', '$user_name', '$password1')";

$conn->exec($sql);
echo "<script>alert('Account successfully added!'); window.location='index.php'</script>";
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Registreren</title>
        <link rel="stylesheet" href="style.css" ">
    </head>
    <body>
        <h2>Maak een account aan</h2>
        <h4>Vul deze formulier in om een account aan te maken.</h4>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

          <div>
              <label>Voornaam
                <input type="text" name="voornaam" required>
             </label>
          </div>
            <div>
                <label>Achternaam
                    <input type="text" name="achternaam" required>
                </label>
            </div>
            <div>
                <label>Stad
                    <input type="text" name="stad" required>
            </label>
            </div>
            <div>
                <label>Adres
                    <input type="text" name="adres" required>
                </label>
            </div>
            <div>
                <label>Telefoonnummer
                    <input type="tel" name="telefoonnummer" required>
                </label>
            </div>
            <div>
                <label>Email
                    <input type="email" name="email" required>
                </label>
            </div>
            <div>
            <label>Wachtwoord
                <input type="password" name="wachtwoord" required>
            </label>
            </div>
            <div>
                <button type="submit" name="submit" >Verstuur</button>
            </div>
        </form>

    </body>
</html>