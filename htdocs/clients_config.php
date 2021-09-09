<?php

session_start();
try{
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

        $options = array("cost"=>4);

        $insert = $con->prepare("INSERT INTO bitfrost_loginsystem.clients_information 
        (voornaam,achternaam,stad,adres,postcode,telefoonnummer,email,wachtwoord)
        values(:voornaam,:achternaam,:stad,:adres,:postcode,:telefoonnummer,:email,:wachtwoord)");
        $insert->bindParam(':voornaam',$voornaam);
        $insert->bindParam(':achternaam',$achternaam);
        $insert->bindParam(':stad',$stad);
        $insert->bindParam(':adres',$adres);
        $insert->bindParam(':postcode',$postcode);
        $insert->bindParam(':telefoonnummer',$telefoonnummer);
        $insert->bindParam(':email',$email);
        $insert->bindParam(':wachtwoord',$wachtwoord);
        $insert->execute();
        echo"<p id='Registratie'>De Registratie is gelukt, je kan nu <a href='KlantenInloggen.php'>Inloggen.</a></p>";
    }elseif(isset($_POST['login'])){
        $email = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];

        $select = $con->prepare("SELECT * FROM clients_information WHERE email='$email' and wachtwoord='$wachtwoord'");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        $data=$select->fetch();
        if($data['email']!=$email and $data['wachtwoord']!=$wachtwoord)
        {
            echo "invalid email or pass";
        }
        elseif($data['email']==$email and $data['wachtwoord']==$wachtwoord)
        {
            $_SESSION['email']=$data['email'];
            $_SESSION['voornaam']=$data['voornaam'];
            header("location:profile.php?action=joined");
        }
    }
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}

?>