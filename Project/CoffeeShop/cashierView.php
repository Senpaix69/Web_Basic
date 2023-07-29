<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee_tea_shop";
$tableName = 'cashier';
$totalCost = 0;

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
            <img src="cashier.png" alt="chefimage" height="100px">
            <button onclick="window.location.replace('logout.php')">Logout</button>
        </div>
        <?php

        foreach ($tableNumbers as $tableNumber) {
            echo "<h2>Table No: " . $tableNumber . "</h2>";
            echo "<table border=1>";
            echo "<tr>
                    <th>Order Id</th>
                    <th>Order Cost</th>
                </tr>";

            foreach ($orders as $order) {
                if ($order['table_no'] == $tableNumber) {
                    $totalCost += $order['total_cost'];
                    echo '<tr>
                                <td>' . $order['order_id'] . '</td>
                                <td>' . $order['total_cost'] . '</td>
                        </tr>';
                }
            }

            echo '<tr>
                        <td colspan=2> <h2> Total Cost: ' . $totalCost . '</h2></td>
                        <td colspan=1 class="action"><a href="recieved.php?table=' . $tableNumber . '">Complete Order⚡</a></td>
                    </tr>';

            $totalCost = 0;
        }

        if (empty($orders)) {
            echo "<h1 class='noOrders'> No Orders Found! </h1>";
        }
        ?>

    </div>
</body>

</html>