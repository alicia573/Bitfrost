
<!doctype html>
<html lang="en">
    <head>
        <title>Registreren</title>
        <link rel="stylesheet" href="style.css" ">
    </head>
    <body>

        <h2>Maak een account aan</h2>
        <h4>Vul deze formulier in om een account aan te maken.</h4>
        <form action="clients_config.php" method="post">
          <div>
              <label>Voornaam
                <input type="text" name="voornaam" class="text-box" required>
             </label>
          </div>
            <div>
                <label>Achternaam
                    <input type="text" name="achternaam" class="text-box" required>
                </label>
            </div>
            <div>
                <label>Stad
                    <input type="text" name="stad" class="text-box" required>
            </label>
            </div>
            <div>
                <label>Adres
                    <input type="text" name="adres" class="text-box" required>
                </label>
            </div>
            <div>
                <label>Telefoonnummer
                    <input type="tel" name="telefoonnummer" class="text-box" required>
                </label>
            </div>
            <div>
                <label>Email
                    <input type="email" name="email" class="text-box" required>
                </label>
            </div>
            <div>
            <label>Wachtwoord
                <input type="password" name="wachtwoord" class="text-box" required>
            </label>
            </div>
            <div>
                <button type="submit" name="submit" >Verstuur</button>
            </div>
        </form>

    </body>
</html>