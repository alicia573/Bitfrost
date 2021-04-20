<?php
session_start();

if(!$_SESSION['id']){
    header('location:KlantenInloggen.php');
}


?>

<h1>Welcome <?php echo ucfirst($_SESSION['first_name']); ?></h1>
<a href="Logout.php?logout=true">Logout</a>