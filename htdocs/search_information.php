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

$sth= $dbh->prepare('SELECT name, password from userplainpasswords where name = :name and password = :password');
$sth->bindParam(':name', $_POST["name"], PDO::PARAM_STR, 45);
$sth->bindParam(':surname', $_POST["surname"], PDO::PARAM_STR, 500);
$sth->execute();
$result = $sth->fetch();
?>

<?php
if($result){
    echo"Welkom".$result['name'];
}


