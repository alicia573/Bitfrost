<?php
session_start();
$host = "localhost";
$db_user = "root";
$db_pass = "alicia573";
$dbname = "bitfrost_loginsystem";

try {
    $connect = new PDO("mysql:host=$host; dbname=$dbname", $db_user, $db_pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}catch(PDOException $e)
    {
        die('unable to connect');
     }
?>
