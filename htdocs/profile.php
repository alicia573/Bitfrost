<?php
 session_start();

 include_once("registerConfig.php");

 echo "Welkom " . $_SESSION['Username'];
 echo "<a href='Logout.php'>Uitloggen</a>";