<?php
session_start();

if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}

if (isset($_SESSION['tableNo'])) {
    unset($_SESSION['tableNo']);
}

header("location: main.php");
exit();
?>