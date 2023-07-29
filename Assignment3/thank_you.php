<?php
session_start();

// Check if the order exists
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $order = $_SESSION['cart'];
} else {
    // Redirect if no order is found
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <table border=1>
        <tr>
            <td colspan=4>
                <h1>Thank You for Your Order!</h1>
            </td>
        </tr>
        <tr>
            <td colspan=4>
                <h2>Order Details</h2>
            </td>
        </tr>
        <tr>
            <th>Item</th>
            <th>Type</th>
            <th>Quantity</th>
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
            </tr>
        <?php } ?>
    </table>

    <?php
    // Clear the order session
    unset($_SESSION['cart']);
    session_destroy();
    ?>
</body>

</html>