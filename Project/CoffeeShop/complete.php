<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee_tea_shop";
$tableName = 'orders';

$tableNumber = $_GET['table'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$q = "DELETE FROM " . $tableName . " where table_no = " . $tableNumber;

if ($conn->query($q) == true) {
    $conn->close();
    echo "<script>window.location.replace('chefView.php');</script>";
} else {
    echo "Query Error: " . $conn->error;
}
?>