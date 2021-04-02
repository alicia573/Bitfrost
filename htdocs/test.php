<?php



ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$connection= ssh2_connect('192.168.178.54', 22);
ssh2_auth_password($connection,'aliciafernandes','alicia573');
 $stream = ssh2_exec($connection,'/usr/local/bin/php -i');

