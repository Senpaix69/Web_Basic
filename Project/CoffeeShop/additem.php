<?php
session_start();

$items = array(
    array('id' => 1, 'name' => 'Espresso', 'type' => 'Coffee', 'price' => 200),
    array('id' => 2, 'name' => 'Cappuccino', 'type' => 'Coffee', 'price' => 300),
    array('id' => 3, 'name' => 'Green', 'type' => 'Tea', 'price' => 250),
    array('id' => 4, 'name' => 'Chamomile', 'type' => 'Tea', 'price' => 650)
);

// Add item to cart
if (isset($_POST['add_to_cart'])) {
    $quantity = $_POST['quantity'];

    if (!isset($_SESSION['tableNo'])) {
        $_SESSION['tableNo'] = $_POST['tableNo'];
    } else if ($_SESSION['tableNo'] != $_POST['tableNo']) {
        $_SESSION['tableNo'] = $_POST['tableNo'];
    }

    foreach ($quantity as $itemId => $itemQuantity) {
        if ($itemQuantity > 0) {
            if (isset($_SESSION['cart'][$itemId])) {
                $_SESSION['cart'][$itemId]['quantity'] = $itemQuantity;
                $_SESSION['cart'][$itemId]['price'] = $items[$itemId]['price'] * $itemQuantity;
            } else {
                $_SESSION['cart'][$itemId] = [
                    'item_id' => $itemId,
                    'name' => $items[$itemId]['name'],
                    'type' => $items[$itemId]['type'],
                    'price' => $items[$itemId]['price'] * $itemQuantity,
                    'quantity' => $itemQuantity
                ];
            }
        }
    }

    header("Location: main.php");
    exit();
}
?>