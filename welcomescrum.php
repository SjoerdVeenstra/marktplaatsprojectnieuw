<?php

// Initialize the session
session_start();

// check if the user is loggen in. if not, then redirect him to the login page.

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginscrum.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcomescrumphp</title>
    <link rel="stylesheet" type="text/css" href="stylesheetscrum.css">
</head>
<body>
<section class =section-c>
<h1>Thank you for registering with Zalado!</h1>
<h4><a href="http://localhost/websites/code4/marktplaatsproject/indexscrum.php">Click here to go back to the index-page</a></h4>
</section>
</body>
</html> 