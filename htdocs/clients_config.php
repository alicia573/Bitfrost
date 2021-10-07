<?php
session_start();
include ('test/config.php');
$connect = new PDO("mysql:host=$host; dbname=$dbname", $db_user, $db_pass);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['submit'])) {

        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $stad = $_POST['stad'];
        $adres = $_POST['adres'];
        $postcode = $_POST['postcode'];
        $telefoonnummer = $_POST['telefoonnummer'];
        $email = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];
        $wachtwoord = password_hash($wachtwoord, PASSWORD_BCRYPT, array("cost" => 8));
        $uppercase = preg_match('@[A-Z]@',$wachtwoord );
        $lowercase = preg_match('@[a-z]@',$wachtwoord );
        $number = preg_match('@[0-9]@',$wachtwoord );
        $specialChars = preg_match('@[^\w]@',$wachtwoord );

        $insert = $connect->prepare("INSERT INTO bitfrost_loginsystem.clients_information
        (voornaam,achternaam,stad,adres,postcode,telefoonnummer,email,wachtwoord)
        values(:voornaam,:achternaam,:stad,:adres,:postcode,:telefoonnummer,:email,:wachtwoord)");
        $insert->bindParam(':voornaam', $voornaam);
        $insert->bindParam(':achternaam', $achternaam);
        $insert->bindParam(':stad', $stad);
        $insert->bindParam(':adres', $adres);
        $insert->bindParam(':postcode', $postcode);
        $insert->bindParam(':telefoonnummer', $telefoonnummer);
        $insert->bindParam(':email', $email);
        $check = $connect->prepare( "SELECT 1 FROM clients_information WHERE email = ?");
        $user = $check->execute([$email]);
        $user = $check->fetch();
        $insert->bindParam(':wachtwoord', $wachtwoord);

        if($user){
            echo"U heeft al een account.";
        }
       else{
            if ($insert->execute()) {

                header ("location:KlantenInloggen.php");
            } else {
                echo"Something went Wrong try again!";
            }
        }
        //if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($wachtwoord) < 8  ) {
        //    echo "Password should be longer";
        // }else{
        //    echo"error";
        //}



    }




?>