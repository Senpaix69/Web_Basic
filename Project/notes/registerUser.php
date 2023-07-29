<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes";
$tableName = "user";


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pass = $_POST['password'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS " . $tableName . " (
    email varchar(255) PRIMARY KEY,
    pass VARCHAR(255) NOT NULL,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL
)";


if ($conn->query($sql) == true) {
    $sql = "INSERT INTO " . $tableName . " (email, pass, lname, fname) VALUES ('" . $email . "', '" . $pass . "', '" . $lname . "', '" . $fname . "');";
    if ($conn->query($sql) == true) {
        $conn->close();
        echo "<script>
        window.location.replace('index.php');
        </script>";
    } else {
        echo $conn->error;
    }
} else {
    echo $conn->error;
}
?>