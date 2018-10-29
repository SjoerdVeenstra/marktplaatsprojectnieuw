<!-- localhost/scrumoefeningphp/registerscrum.php 

Kleine file alleen voor connectie alle php op website (require once config.php)

MySQLi Procedural-->

<?php
$link = mysqli_connect(localhost, root, mysql, register);

if($link === false ){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>

<!-- mysqli_close($conn); -->