<?php
session_start();

include_once('registerConfig.php');


if(isset($_POST['create'])) {
    $db = Config::connect();


    $Name = sanatizeString($_POST['Name']);
    $Surname = sanatizeString($_POST['Surname']);
    $Address = sanatizeString($_POST['Address']);
    $PostalCode = sanatizeString($_POST['PostalCode']);
    $City = sanatizeString($_POST['City']);
    $PhoneNumber = sanatizeString($_POST['PhoneNumber']);
    $Email = sanatizeString($_POST['Email']);
    $Username = sanatizeString($_POST['Username']);
    $Password = sanatizePassword($_POST['Password']);

    if($Name == ""|| $Surname == "" || $Address == "" || $PostalCode == ""|| $City == ""||
        $PhoneNumber == ""|| $Email == ""|| $Username == ""|| $Password == ""){
        return;
    }
    insertDetails($db, $Name, $Surname, $Address, $PostalCode, $City, $PhoneNumber, $Email, $Username, $Password);
    {
        $_SESSION['Username'] = $Username;
        header("Location: profile.php");
    }
}
if(isset($_POST['login'])) {
    $db = Config::connect();

    $Username = sanatizeString($_POST['Username']);
    $Password = sanatizePassword($_POST['Password']);


    if(checkLogin($db,$Username,$Password)){
        $_SESSION['Username'] = $Username;
        header("Location: profile.php");
    }else{
        echo"De gebruikersnaam of wachtwoord zijn niet correct.";
    }
}

    function insertDetails($db, $Name, $Surname, $Address, $PostalCode, $City, $PhoneNumber, $Email, $Username, $Password)
    {

        $query = $db->prepare("
        INSERT INTO clients_information(Name, Surname, Address, PostalCode, City, PhoneNumber, Email, Username, Password)
        VALUES(:Name, :Surname, :Address, :PostalCode, :City, :PhoneNumber, :Email, :Username, :Password)
        
        ");
        $query->bindParam(":Name", $Name);
        $query->bindParam(":Surname", $Surname);
        $query->bindParam(":Address", $Address);
        $query->bindParam(":PostalCode", $PostalCode);
        $query->bindParam(":City", $City);
        $query->bindParam(":PhoneNumber", $PhoneNumber);
        $query->bindParam(":Email", $Email);
        $query->bindParam(":Username", $Username);
        $query->bindParam(":Password", $Password);
        return $query->execute();
    }
    function checkLogin($db,$Username,$Password){
        $query = $db->prepare("
        SELECT * FROM clients_information WHERE  Username=:Username AND Password=:Password
        ");

        $query->bindParam(":Username", $Username);
        $query->bindParam(":Password", $Password);
        return $query->execute();

        if($query->rowCount() == 1){
            return true;
        }else{
            return false;
        }

    }

    function sanatizeString($string){

        $string = strip_tags($string);

        $string = str_replace("","", $string);

        return $string;
    }

    function sanatizePassword($string){
        $string = password_hash($string,$string);

        return $string;
    }