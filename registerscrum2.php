<?php
// Include config file
require_once "configscrum.php";
 
// Define variables and initialize with empty values
$email = $password = $confirm_password = "";
$email_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an e-mail address.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password);
            
            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: loginscrum.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>scrumprojectmarktplaats_Sjoerd_Veenstra</title>
<link rel="stylesheet" type="text/css" href="stylesheetscrum.css">
</head>

<body>
    <div id="registerpagina">
         <section class="section-aa">
                Sign up as a customer
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"><!-- verwijzen naar php op dezelfde pagina -->
                     <input type ="text" name="firstname" placeholder="First name..." class="formstyle">
                     <input type="text" name="lastname" placeholder="Last name..." class="formstyle">
                     <input type="radio" name="gender" value="Male" label="Male" class="formstyle"><h6>Male</h6><br>
                     <input type="radio" name="gender" value="Female" label="Female" class="formstyle"><h6>Female</h6>
                     
            <div class ="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>"> 
                     <input type="email" name="email" placeholder="Your e-mail-address..." class="formstyle form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            
            <div class ="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                     <input type="password" name="password" placeholder="Choose your password..." class="formstyle form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>     

            <div class ="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                     <input type="password" name="password" placeholder="Repeat your password..." class="formstyle form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>     
            </div>         
                     
                     
                     <input type="submit" name="submit" value="Submit" id="submit-button" class="btn btn-primary"><br>
                     <p style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                      font-size:12px; padding-top:15px;">Already have an account? <a href="loginscrum.php"
                      id="login-button">Login here</a></p>
                </form>
        </section>

        <section class="section-ba">
                Sign up as a seller
                <form action="registerscrum.php" method="POST">
                    <input type ="text" name="firstname" placeholder="First name..." class="formstyle">
                    <input type="text" name="lastname" placeholder="Last name..." class="formstyle">
                    <input type="radio" name="gender" value="Male" class="formstyle"><h6>Male</h6><br>
                    <input type="radio" name="gender" value="Female" class="formstyle"><h6>Female</h6>
                    <input type="email" name="email" placeholder="Your e-mail-address..." class="formstyle">
                    <input type="password" name="password" placeholder="Choose your password..." class="formstyle">
                    <input type="password" name="password" placeholder="Repeat your password..." class="formstyle">
                    <input type="submit" name="submit" value="Submit" id="submit-button">
                    
                </form>
        </section>
    </div>

</body>
</html>