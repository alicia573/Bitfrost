<?php
session_start();
include ('test/config.php');
$connect = new PDO("mysql:host=$host; dbname=$dbname", $db_user, $db_pass);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_POST["login"]))
{
    $wachtwoord= $_POST['wachtwoord'];
    $email= $_POST['email'];
    if(empty($email) || empty($wachtwoord))
    {
        $error_message = '<label>Vul de je inlog gegevens in.</label>';
    }
    else
    {
        $select = $connect->prepare("SELECT * FROM bitfrost_loginsystem.clients_information WHERE email='$email' and wachtwoord='$wachtwoord'");
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        $data = $select->fetch();

        $count = $data->rowCount();
        if($count > 0)
        {
            if($data['email'] == $email){
                if(password_verify($wachtwoord, $data['wachtwoord'])){
                    $_SESSION['email']= $data['email'];
                    $_SESSION['voornaam']= $data['voornaam'];
                    header("location:profile.php?action=joined");
                }else{
                    echo'Verkeerde wachtwoord';
                }
            }echo "Verkeerde email";
        }
        else
        {
            $error_message = 'Onjuiste Gegevens!';
        }
    }
}