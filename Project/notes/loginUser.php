<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes";
$tableName = "user";

$email = $_POST['email'];
$pass = $_POST['password'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM " . $tableName . " WHERE email='" . $email . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['pass'] === $pass) {
        session_start();

        $_SESSION['name'] = $row['fname'] . ' ' . $row['lname'];
        $_SESSION['email'] = $email;

        echo "<script>
        window.location.replace('main.php');
        </script>";
    } else {
        echo "Incorrect password";
    }
} else {
    echo "User not found";
}

$conn->close();

?>