<?php
 session_start();

 include_once("registerConfig.php");

 echo "Welkom " . $_SESSION['Username'];