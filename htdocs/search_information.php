<?php
$host='localhost';
$db='bitfrost_loginsystem';
$user='root';
$pass='alicia573';
$charset='utf8mb4';
$opt=[
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try{
    $dsn="mysql:host=$host;dbname=$db;charset=$charset";
    $dbh= new PDO($dsn, $user, $pass, $opt);
    echo "it worked";
}
catch(PDOException $e){
    error_log('PDO Exception:'.$e->getMessage());
    die('PDO says no.');
}

$sth= $dbh->prepare('SELECT * from bitfrost_loginsystem.clients_information');
$sth->execute();
$result = $sth->fetch();
?>

<?php
