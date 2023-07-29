<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee_tea_shop";
$tableName = 'orders';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$q = "SELECT * FROM " . $tableName . " ORDER BY table_no";
$result = $conn->query($q);
$orders = array();
if ($result == true && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}

$query = "SELECT DISTINCT table_no FROM " . $tableName;
$result = $conn->query($query);

$tableNumbers = array();

if ($result == true && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tableNumbers[] = $row['table_no'];
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee & Tea Shop</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class='container'>
        <div class='navbar'>
            <h1> Orders </h1>
            <img src="chef.png" alt="chefimage" height="100px">
            <button onclick="window.location.replace('logout.php')">Logout</button>
        </div>
        <?php

        foreach ($tableNumbers as $tableNumber) {
            echo "<h2>Table No: " . $tableNumber . "</h2>";
            echo "<table border=1>";
            echo "<tr>
                    <th>Item Name</th>
                    <th>Item Type</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>";

            foreach ($orders as $order) {
                if ($order['table_no'] == $tableNumber) {
                    echo '<tr>
                            <td>' . $order['item_name'] . '</td>
                            <td>' . $order['item_type'] . '</td>
                            <td>' . $order['item_quantity'] . '</td>
                            <td>' . $order['item_price'] . '</td>
                    </tr>';
                }
            }
            echo "<tr>
                        <td colspan=4 class='action'><a href='complete.php?table=" . $tableNumber . "'>Complete Order</a></td>
                    </tr>
            </table>";
        }

        if (empty($orders)) {
            echo "<h1 class='noOrders'> No Orders Found! </h1>";
        }
        ?>

    </div>
</body>

</html>