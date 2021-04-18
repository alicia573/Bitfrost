
<?php
$dsn = 'mysql:dbname=bitfrost_loginsystem;host=localhost';
$user = 'root';
$password = 'alicia573';

try
{
    $PDO = new PDO($dsn,$user,$password);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "PDO error".$e->getMessage();
    die();
}
?>
