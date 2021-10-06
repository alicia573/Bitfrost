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
       echo'<label>Vul de je inlog gegevens in.</label>';
    }
    else
    {   $query = "SELECT * FROM clients_information WHERE email = '$email' AND wachtwoord = '$wachtwoord' ";
        $select = $connect->prepare($query);
        $select->execute();
        $data = $select->fetch(PDO::FETCH_ASSOC);

        if($select->rowCount() > 0)
        {
            if($data['email'] == $email){
                    if(password_verify($wachtwoord, $data['wachtwoord'])){
                    $_SESSION['email']= $_POST['email'];
                    $_SESSION['voornaam']= $_POST['voornaam'];
                    header("location:profile.php?");
                }else{
                    echo'Verkeerde wachtwoord';
                }
            }echo "Verkeerde email";
        }
        else
        {
            echo'Onjuiste Gegevens!';
        }
    }
}