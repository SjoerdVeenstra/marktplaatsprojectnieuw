<!DOCTYPE html>
<html>
<head>
<title>marktplaatsproject_Sjoerd_Veenstra</title>
<link rel="stylesheet" type="text/css" href="stylesheetmarktplaats.css">
</head>

<body>
    <section>
        <form action="validatemarktplaats.php" method="POST" target="_blank"> 
        <p>Sign up as a customer</p>
            <input type ="text" name="firstname" placeholder="First name..." class="form-style">
            <input type="text" name="lastname" placeholder="Last name..." class="form-style">
            <input type="text" name="email" placeholder="E-mail..." class="form-style">
            <input type="password" name="password" placeholder="Password..." class="form-style">
            <input type="submit" value="Submit">

        <!-- <form action="<?php ($_SERVER["validatemarktplaats.php"]); ?>" method="POST" target="_blank"> 
        <p>Sign up as a seller</p>
            <input type ="text" name="firstname" placeholder="First name...">
            <input type="text" name="lastname" placeholder="Last name...">
            <input type="text" name="email" placeholder="E-mail...">
            <input type="text" name="password" placeholder="Password...">
            <input type="submit" value="Submit">            
        </form> -->
</section>

</body>

</html>