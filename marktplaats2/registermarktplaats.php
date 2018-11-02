<?php

include 'configmarktplaats.php';
include 'viewcustomer.inc.php';

?>
<!DOCTYPE html>
<html>
<head>
<title>project_marktplaats_register_Sjoerd_Veenstra</title>
<link rel="stylesheet" type="text/css" href="stylesheetmarktplaats.css">
</head>

<body>
    <section>
    
    <!-- <div id="register-frame"> -->
        <form action="validatemarktplaats.php" method="POST" target="_blank" class="form"> 
        <p class="form-intro"><b>Sign up as a customer:</b></p><br>
            <input type ="text" name="firstname" placeholder="First name..." onfocus="this.value=''" class="form-style"><br><br>
            <input type="text" name="lastname" placeholder="Last name..." onfocus="this.value=''" class="form-style"><br><br>
            <input type="text" name="email" placeholder="E-mail..." onfocus="this.value=''" class="form-style"><br><br>
            <input type="password" name="password" placeholder="Password..." onfocus="this.value=''" class="form-style"><br><br>
            <input type="submit" value="Submit" class="submit-button">
        </form>
    </div>

        <!-- <form action="<?php ($_SERVER["validatemarktplaats.php"]); ?>" method="POST" target="_blank"> 
        <p>Sign up as a seller</p>
            <input type ="text" name="firstname" placeholder="First name...">
            <input type="text" name="lastname" placeholder="Last name...">
            <input type="text" name="email" placeholder="E-mail...">
            <input type="text" name="password" placeholder="Password...">
            <input type="submit" value="Submit">            
        </form> -->
</section>

<div id="footerbar">
    <footer>
        <h4><a href="http://localhost/websites/code4/marktplaatsproject/marktplaats2/indexmarktplaats.php" target="_blank">Home</a></h4>
    </footer>
        </div>

</body>

</html>