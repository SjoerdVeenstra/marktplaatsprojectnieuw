<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$myDB = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $myDB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

// // Create database
// $sql = "CREATE DATABASE myDB";
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }

// $conn->close();

// $sql = "CREATE TABLE Customers (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(30) NOT NULL,
//     lastname VARCHAR (30) NOT NULL,
//     email VARCHAR(50),
//     password VARCHAR(30) NOT NULL,
//     reg_date TIMESTAMP
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "Table Customers created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

// $conn->close();

// $sql = "CREATE TABLE Sellers (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
//     firstname VARCHAR(30) NOT NULL,
//     lastname VARCHAR(30) NOT NULL,
//     email VARCHAR(50) NOT NULL,
//     password VARCHAR(30) NOT NULL, 
//     reg_date TIMESTAMP
//     )";
    
//     if ($conn->query($sql) === TRUE) {
//         echo "Table Sellers created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }
    
//     $conn->close();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "INSERT INTO Customers (firstname, lastname, email, password)
VALUES ('$firstname', '$lastname', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: "   . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn); 2 
// loginpagina (op validate of doorverwijzen?), welkomstpagina, code oop.
?>




