<!doctype html>
<html lang="en">
    <head>
        <link rel = "icon" type = "image/png" href = "Images/logo.png">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <title>Registreren</title>
        <link rel="stylesheet" href="style.css" ">
    </head>
    <body>
    <div id="wrapper-register">
        <h2>Maak een account aan</h2>
        <h4>Vul deze formulier in om een account aan te maken.</h4>
        <form action="clients_config.php" method="post" id="register_form" autocomplete="off">
          <div>
              <label>Voornaam
                <input type="text" name="voornaam" class="text-box" autocomplete="off" required>
             </label>
          </div>
            <div>
                <label>Achternaam
                    <input type="text" name="achternaam" class="text-box" autocomplete="off" required>
                </label>
            </div>
            <div>
                <label>Stad
                    <input type="text" name="stad" class="text-box" autocomplete="off" required>
            </label>
            </div>
            <div>
                <label>Adres
                    <input type="text" name="adres" class="text-box" autocomplete="off"required>
                </label>
            </div>
            <div>
                <label>Postcode
                    <input type="text" name="postcode" class="text-box" autocomplete="off" required>
                </label>
            </div>
            <div>
                <label>Telefoonnummer
                    <input type="tel" name="telefoonnummer" class="text-box" autocomplete="off" required>
                </label>
            </div>
            <div>
                <label>Email
                    <input type="email" name="email" class="text-box" autocomplete="off" required>
                </label>
            </div>
            <div>
            <label>Wachtwoord
                <input type="password" name="wachtwoord" class="text-box" autocomplete="off" required>
            </label>
            </div>
            <div>
                <button type="submit" name="submit" id="login-btn-client">Verstuur</button>
            </div>
        </form>
        <p>Heb je al een account dan kun je hier<a href="KlantenInloggen.php" style="text-decoration: none; color: blue;"> Inloggen.</a></p>
        <img src="">
    </div>
    </body>

</html>