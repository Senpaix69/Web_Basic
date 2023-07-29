<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee_tea_shop";
$tableName = 'orders';
$cashier = 'cashier';
$totalCost = 0;


// Check if the order exists
if (isset($_SESSION['cart']) && isset($_SESSION['tableNo']) && !empty($_SESSION['cart'])) {
    $order = $_SESSION['cart'];
    $tableNo = $_SESSION['tableNo'];

    foreach ($order as $item) {
        $totalCost += $item['price'];
    }


    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $q = "CREATE TABLE IF NOT EXISTS " . $tableName . " (`order_id` INT NOT NULL AUTO_INCREMENT , `item_name` VARCHAR(20) NOT NULL , `item_type` VARCHAR(20) NOT NULL , `item_quantity` INT NOT NULL , `item_price` INT NOT NULL , `table_no` INT NOT NULL , PRIMARY KEY (`order_id`));";
    if ($conn->query($q) == true) {
        foreach ($order as $item) {
            $q = "INSERT INTO " . $tableName . "(table_no, item_name, item_type, item_quantity, item_price) VALUES ('" . $tableNo . "', '" . $item['name'] . "', '" . $item['type'] . "', " . $item['quantity'] . ", " . $item['price'] . ");";
            if ($conn->query($q) != true) {
                echo $conn->error;
            }
        }

        $q = "CREATE TABLE IF NOT EXISTS " . $cashier . " (`order_id` INT NOT NULL AUTO_INCREMENT, `total_cost` INT NOT NULL, `table_no` INT NOT NULL, PRIMARY KEY (`order_id`));";
        if ($conn->query($q) == true) {
            $q = "INSERT INTO " . $cashier . "(table_no, total_cost) VALUES ('" . $tableNo . "', " . $totalCost . ");";
            if ($conn->query($q) != true) {
                echo $conn->error;
            }
            $conn->close();
        } else {
            die("Cashier Query failed: " . $conn->error);
        }
    } else {
        die("Main Query failed: " . $conn->error);
    }
} else {
    // Redirect if no order is found
    echo "<script>window.location.replace('main.php'); </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class='container'>
        <table border=1>
            <tr>
                <td colspan=4>
                    <h1>Thank You for Your Order!</h1>
                </td>
            </tr>
            <tr>
                <td colspan=3>
                    <h2>Order Details</h2>
                </td>
                <td colspan>
                    <h2>Table No
                        <?php echo $tableNo ?>
                    </h2>
                </td>
            </tr>
            <tr>
                <th>Item</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <?php foreach ($order as $item) { ?>
                <tr>
                    <td>
                        <?php echo $item['name']; ?>
                    </td>
                    <td>
                        <?php echo $item['type']; ?>
                    </td>
                    <td>
                        <?php echo $item['quantity'][0]; ?>
                    </td>
                    <td>
                        <?php echo $item['price']; ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan=4>
                    <?php echo "<h4>Total Cost: " . $totalCost . "</h4>"; ?>
                </td>
            </tr>
        </table>
        <button class="order" onclick="window.location.replace('main.php');">Go Back</button>
    </div>

    <?php
    // Clear the order session
    unset($_SESSION['cart']);
    unset($_SESSION['tableNo']);
    session_destroy();
    ?>
</body>

</html>