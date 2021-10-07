<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include ('test/config.php');

try {
    $connect = new PDO("mysql:host=$host; dbname=$dbname", $db_user, $db_pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST["login"])) {
        $wachtwoord = $_POST['wachtwoord'];
        $email = $_POST['email'];

        if ($email == "" || $wachtwoord == "") {
             $error_message = '<label>Vul je inlog gegevens in.</label>';

        } else {
            $query = "SELECT * FROM clients_information WHERE email = '$email'";
            $select = $connect->prepare($query);
            $select->execute();
            $data = $select->fetch(PDO::FETCH_ASSOC);

            if ($data && password_verify($wachtwoord, $data['wachtwoord'])) {
                $_SESSION['email'] = $data['email'];
                $_SESSION['voornaam'] = $data['voornaam'];
                header("location:profile.php");
            } else {
                 $error_message ="Onjuiste Gegevens";

            }
        }
    }
}
catch (PDOException $error){

    $error_message = $error->getMessage();
}