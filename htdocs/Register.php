<?php
require_once('registerConfig.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Registreer</title>
</head>
    <body>
        <div>
        </div>
        <form action="process.php" method="post">
            <label>Voornaam
                <input class="Search" name="Name" type="text" required>
            </label><br>
            <label>Achternaam
                <input class="Search" name="Surname" type="text" required>
            </label><br>
            <label>Adres
                <input class="Search" name="Address" type="text" required>
            </label><br>
            <label>Postcode
                <input class="Search" name="PostalCode" type="text" required>
            </label><br>
            <label>Plaats
                <input class="Search" name="City" type="text" required>
            </label><br>
            <label>Telefoonnummer
                <input class="Search" name="PhoneNumber" type="text" required>
            </label><br>
            <label>Email
                <input class="Search" name="Email" type="email" required>
            </label><br>
            <label>Gebruikersnaam
                <input class="Search" name="Username" type="" required>
            </label><br>
            <label>Wachtwoord
                <input class="Search" name="Password" type="password" required>
            </label><br>
            <input type="submit" name="create" value="Submit">
        </form>
    </body>
</html>