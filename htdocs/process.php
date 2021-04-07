<?php
session_start();

include_once('registerConfig.php');


if(isset($_POST['create'])) {
    $db = Config::connect();


    $Name = $_POST['Name'];
    $Surname = $_POST['Surname'];
    $Address = $_POST['Address'];
    $PostalCode = $_POST['PostalCode'];
    $City = $_POST['City'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Email = $_POST['Email'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    if (insertDetails($db, $Name,$Surname, $Address, $PostalCode, $City, $PhoneNumber, $Email, $Username, $Password)) ;
    {
        $_SESSION['Username'] = $Username;
        header("Location: profile.php");
    }
}
if(isset($_POST['login'])) {
    $db = Config::connect();

    $Email = $_POST['Email'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    if (insertDetails($db, $Name, $Surname, $Address, $PostalCode, $City, $PhoneNumber, $Email, $Username, $Password)) ;
    {
        $_SESSION['Username'] = $Username;
        header("Location: profile.php");
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
