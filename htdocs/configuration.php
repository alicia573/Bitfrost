<?php
require 'config.php';
const BASEPATH = true;
if(isset($_POST['submit'])){
    try{
        include_once('config.php');
        $dsn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $dsn->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $naam= $_POST['voornaam'];
        $achternaam= $_POST['achternaam'];
        $stad= $_POST['stad'];
        $adres= $_POST['adres'];
        $telefoonnummer= $_POST['telefoonnummer'];
        $email= $_POST['email'];
        $wachtwoord= $_POST['wachtwoord'];

        $wachtwoord= password_hash($wachtwoord,PASSWORD_BCRYPT, array("cost"=>12));

        $sql= "SELECT COUNT(email) as num from clients_information where email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email',$email);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['num']> 0){
            echo"<script>alert('Email bestaat al')</script>";
        }else{
            $stmt = $dsn->prepare("INSERT INTO bitfrost_loginsystem.clients_information(voornaam, achternaam, stad, adres,telefoonnummer, email, wachtwoord)
            VALUES (
                    :voornaam,:achternaam,:stad,:adres,:telefoonnummer,:email,:wachtwoord
            )");
            $stmt->bindParam(':voornaam',$voornaam);
            $stmt->bindParam(':achternaam',$achternaam);
            $stmt->bindParam(':stad',$stad);
            $stmt->bindParam(':adres',$adres);
            $stmt->bindParam(':telefoonnummer',$telefoonnummer);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':wachtwoord',$wachtwoord);

            if($stmt->execute()){
                echo '<script>alert("Registratie voltooid");</script>';
            }else{
                $error= "Error: ".$e->getMessage();
                echo "<script>alert('.$error.')</script>";

            }
        }
    }catch (PDOException $e){
        $error= "Error: ".$e->getMessage();
        echo "<script>alert('.$error.')</script>";
    }

}