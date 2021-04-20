
<?php

$host= 'localhost';
$dbname='bitfrost_loginsystem';
$user = 'root';
$password = 'alicia573';
$dsn='';
try
{
    $dsn = 'mysql:host='.$host.';dbname='.$dbname;
    $pdo = new PDO($dsn,$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "PDO error".$e->getMessage();
    die();
}
?>
