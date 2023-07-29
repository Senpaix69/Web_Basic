<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Coffee and tea items
$items = array(
    array('id' => 1, 'name' => 'Espresso', 'type' => 'Coffee', 'price' => 200),
    array('id' => 2, 'name' => 'Cappuccino', 'type' => 'Coffee', 'price' => 300),
    array('id' => 3, 'name' => 'Green', 'type' => 'Tea', 'price' => 250),
    array('id' => 4, 'name' => 'Chamomile', 'type' => 'Tea', 'price' => 650)
);
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
            <div>
                <img src="customer.png" alt="customerimage" height="90px">
                <h1> Welcome Customer! </h1>
            </div>
            <div>
                <button onclick="window.location.replace('clearCart.php')">Clear Cart</button>
                <button onclick="window.location.replace('logout.php')">Logout</button>
            </div>
        </div>
        <table border="1">
            <form action="additem.php" method="post">
                <tr>
                    <td colspan="3">
                        <h2>Menu</h2>
                    </td>
                    <td>
                        <input class="tableNo" type="number" name="tableNo"
                            value="<?php echo isset($_SESSION['tableNo']) ? $_SESSION['tableNo'] : ''; ?>" min="1"
                            max="8" placeholder="Table" required />
                    </td>
                </tr>
                <tr>
                    <th>Item</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                <?php foreach ($items as $item) { ?>
                    <tr>
                        <td>
                            <?php echo $item['name']; ?>
                        </td>
                        <td>
                            <?php echo $item['type']; ?>
                        </td>
                        <td>
                            <input type="number" name="quantity[]" value="0" min="0">
                        </td>
                        <td>
                            <?php echo $item['price'] . " /-1"; ?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan=4 class='action'>
                        <input type="submit" name="add_to_cart" value="Add to Cart">
                    </td>
                </tr>
            </form>
        </table>


        <br>
        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>
            <table border=1>
                <tr>
                    <td colspan=4>
                        <h2>Cart</h2>
                    </td>
                    <td class='tableNo'>
                        <?php echo 'Table No ' . $_SESSION['tableNo']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Item</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Price</th>
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
                            <td>
                                <?php echo $cartItem['price']; ?>
                            </td>
                            <td class="action">
                                <input type="submit" name="remove_from_cart" value="Remove from cart">
                            </td>
                        </tr>
                    </form>
                <?php } ?>
            </table>
            <button class='order' onclick="window.location.replace('thank_you.php');">place order</button>
        <?php } else { ?>
            <h2>No items in the cart.</h2>
        <?php } ?>
        <br>
    </div>
</body>

</html>