<?php
// initialize the session
session_start();

// check if the user is already logged in. If yes, then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header ("location: welcomescrum.php");
    exit;
}

//include config file
require_once "configscrum.php";

//define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

// processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your e-mailadres.";
    }
    else{
        $email = trim($_POST["email"]);
    }

    // check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password";
    }
    else{
        $password = trim($_POST["password"]);
    }

    //validate credentials
    if(empty($email_err) && empty($password_err)){
        
        //prepare select statement
        $sql = "SELECT id, email, password FROM customers WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            //bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            //set parameters
            $param_email = $email;

            //attempt to execute the prepared statement
            if(mysqli_stmt_num_rows($stmt) == 1){
                // store result
                mysqli_stmt_store_result($stmt);

                //check if username exists, if yes, then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){

                            // password is correct, so start a new session
                            session_start();
                            
                            //store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // redirect user to welcome page
                            header("location: welcomescrum.php");
                        }
                        else{
                            // display an error message is password is not valid
                            $password_err = "The password you entered is not valid";
                        }
                    }
    }
                    else{
                        //display an error message if the email doesn't exist
                        $email_err = "No account exists with that e-mail address.";
                    }
                }
                    else{
                        echo "Oops! Something went wrong. Please try again later"; 
                        }
            }
            // close statement
            mysqli_stmt_close($stmt);
        }
        // close connection
        mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loginscrum</title>
    <link rel="stylesheet" type="text/css" href="stylesheetscrum.css">
    
</head>
<body>
    <section>
    <div class="formstyle, section-aa">
        <p>Login customers</p>
        <p style="font-size:14px;">Please fill in your credentials to login.</p><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label><p style="font-size:14px;">E-mail</p></label>
                <input type="text" name="email" class="form-control form-style"><?php echo $email; ?><br>
                <span class="help-block"><?php echo $email_err; ?></span><br>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label><p style="font-size:14px;">Password</p></label>
                <input type="password" name="password" class="form-control form-style"><br>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login" id="login-button">
            </div>
            <p style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                      font-size:12px; padding-top:15px;">Don't have an account? <a href="registerscrum.php" id="signup-button">Sign up now</a>.</p>

        </form>
    </div>    
</section>
</body>
</html>

