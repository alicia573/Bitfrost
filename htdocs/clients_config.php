<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();

    $con = new PDO ("mysql:host=localhost;dbname=bitfrost_loginsystem","root","root");
    if(isset($_POST['submit'])){
        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $stad = $_POST['stad'];
        $adres = $_POST['adres'];
        $postcode = $_POST['postcode'];
        $telefoonnummer = $_POST['telefoonnummer'];
        $email = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];

        $hash = password_hash($wachtwoord,PASSWORD_DEFAULT);

        $insert = $con->prepare("INSERT INTO clients_information 
        (voornaam,achternaam,stad,adres,telefoonnummer,email,wachtwoord)
        values(:voornaam,:achternaam,:stad,:adres,:telefoonnummer,:email,:wachtwoord)");
        $insert->bindParam(':voornaam',$voornaam);
        $insert->bindParam(':achternaam',$achternaam);
        $insert->bindParam(':stad',$stad);
        $insert->bindParam(':adres',$adres);
        $insert->bindParam(':postcode',$postcode);
        $insert->bindParam(':telefoonnummer',$telefoonnummer);
        $insert->bindParam(':email',$email);
        $insert->bindParam(':wachtwoord',$hash);
        $data = $insert->execute();
        if ($data){
            echo"<p id='Registratie'>De Registratie is gelukt, je kan nu <a href='KlantenInloggen.php'>Inloggen.</a></p>";

        }else{
            echo'fout';
        }

    }
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];

        $select = $con->prepare("SELECT * FROM clients_information WHERE email = '$email' and wachtwoord='$wachtwoord'");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        $data = $select->fetch();
        if(password_verify($wachtwoord, $data['wachtwoord'])) {
            $_SESSION['email']=$data['email'];
            $_SESSION['voornaam']=$data['voornaam'];
            header("location:profile.php?action=joined");
        }
        else
        {
            echo "invalid email or pass";
        }
    }


?>