<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Coffee and tea items
$items = array(
    array('id' => 1, 'name' => 'Espresso', 'type' => 'Coffee'),
    array('id' => 2, 'name' => 'Cappuccino', 'type' => 'Coffee'),
    array('id' => 3, 'name' => 'Green', 'type' => 'Tea'),
    array('id' => 4, 'name' => 'Chamomile', 'type' => 'Tea')
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee & Tea Shop</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class='container'>
        <table border=1>
            <tr>
                <td colspan=4>
                    <h2>Menu</h2>
                </td>
            </tr>
            <tr>
                <th>Item</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <?php foreach ($items as $item) { ?>
                <form action="<?php echo 'additem.php?id=' . $item['id'] ?>" method="post">
                    <tr>
                        <td>
                            <?php echo $item['name']; ?>
                        </td>
                        <td>
                            <?php echo $item['type']; ?>
                        </td>
                        <td>
                            <input type="number" name="quantity[]" value="1" min="1">
                        </td>
                        <td>
                            <input type="submit" name="add_to_cart" value="Add to Cart">
                        </td>
                    </tr>
                </form>
            <?php } ?>
        </table>

        <br>
        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>
            <table border=1>
                <tr>
                    <td colspan=4>
                        <h2>Cart</h2>
                    </td>
                </tr>
                <tr>
                    <th>Item</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($_SESSION['cart'] as $cartItem) { ?>
                    <form action="deleteitem.php" method="post">
                        <input type="hidden" name="item_id" value="<?php echo $cartItem['item_id']; ?>">
                        <tr>
                            <td>
                                <?php echo $cartItem['name']; ?>
                            </td>
                            <td>
                                <?php echo $cartItem['type']; ?>
                            </td>
                            <td>
                                <?php echo $cartItem['quantity'][0]; ?>
                            </td>
                            <td><input type="submit" name="remove_from_cart" value="Remove from cart"></td>
                        </tr>
                    </form>
                <?php } ?>
            </table>
            <button><a href="thank_you.php"> place order </a></button>
        <?php } else { ?>
            <p>No items in the cart.</p>
        <?php } ?>
        <br>
    </div>
</body>

</html>