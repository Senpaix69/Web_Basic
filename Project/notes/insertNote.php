<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes";
$tableName = "note";

$title = $_POST['title'];
$text = $_POST['text'];
$date = $_POST['date'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS " . $tableName . " (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    text VARCHAR(255) NOT NULL,
    date VARCHAR(20) NOT NULL
)";

if ($conn->query($sql) == true) {
    if (!isset($_SESSION['email'])) {
        echo "Please login again";
    } else {
        $sql = "INSERT INTO " . $tableName . " (email, title, text, date) VALUES ('" . $_SESSION['email'] . "', '" . $title . "', '" . $text . "', '" . $date . "');";
        if ($conn->query($sql) == true) {
            $conn->close();
            header("Location:main.php");
        } else {
            echo $conn->error;
        }
    }

} else {
    echo $conn->error;
}

?>