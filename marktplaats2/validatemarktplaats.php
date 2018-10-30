
<?php
$errors= array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["firstname"])) {
        array_push($errors, "Voornaam is niet ingevuld");
    }
    else {
        $name = $_POST["firstname"];
    }

    if (empty($_POST["lastname"])) {
        array_push($errors, "Achternaam is niet ingevuld");
    }
    else {
        $address = $_POST["lastname"];
    }

    if (empty($_POST["email"])) {
        array_push($errors, "E-mail is niet ingevuld");
    }
    else {
        $address = $_POST["email"];
    }

    if (empty($_POST["password"])) {
        array_push($errors, "Wachtwoord is niet ingevuld");
    }
    else {
        $address = $_POST["password"];
    }
   
}

if (count($errors)==0){
 echo $_POST["firstname"];
 echo $_POST["lastname"];
 echo $_POST["email"];
 echo $_POST["password"];
include 'configmarktplaats.php';

}
else{
    echo "gegevens zijn niet compleet!";
    foreach ($errors as $error) {
        echo $error;
 }

}
?>