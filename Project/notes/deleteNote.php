<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes";
$tableName = "note";


$id = $_GET['id'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM " . $tableName . " where id=" . $id;

if ($conn->query($sql) == true) {
    $conn->close();
    header("Location:main.php");
} else {
    echo $conn->error;
}

?>