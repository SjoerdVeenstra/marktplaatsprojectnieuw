<!-- localhost/scrumoefeningphp/registerscrum.php 

Kleine file alleen voor connectie alle php op website (require once config.php)

MySQLi Procedural-->

<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'mysql');
define('DB_NAME', 'register');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false ){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>

<!-- mysqli_close($conn); -->