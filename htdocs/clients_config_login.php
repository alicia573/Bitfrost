<?php
include ('test/config.php');
$connect = new PDO("mysql:host=$host; dbname=$dbname", $db_user, $db_pass);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_POST["login"]))
{
    $wachtwoord= $_POST['wachtwoord'];
    $email= $_POST['email'];
    if(empty($email) || empty($wachtwoord))
    {
        $errormsg = '<label>Vul de je inlog gegevens in.</label>';
    }
    else
    {   $query = "SELECT * FROM clients_information WHERE email = '$email'";
        $select = $connect->prepare($query);
        $select->execute();
        $data = $select->fetch(PDO::FETCH_ASSOC);

        if($data && password_verify($wachtwoord , $data['wachtwoord']) ){
            session_start();
            $_SESSION['email']= $data['email'];
            $_SESSION['voornaam']= $data['voornaam'];
            header("location:profile.php");
        }
        else
        {
            echo'Onjuiste Gegevens!';
        }
    }
}