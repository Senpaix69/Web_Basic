<?php
session_start();

// Coffee and tea items
$items = array(
    array('id' => 1, 'name' => 'Espresso', 'type' => 'Coffee', 'price' => 200),
    array('id' => 2, 'name' => 'Cappuccino', 'type' => 'Coffee', 'price' => 300),
    array('id' => 3, 'name' => 'Green', 'type' => 'Tea', 'price' => 250),
    array('id' => 4, 'name' => 'Chamomile', 'type' => 'Tea', 'price' => 650)
);


// Remove item to cart
if (isset($_POST['remove_from_cart'])) {
    $itemId = intval($_POST['item_id']);

    if (isset($_SESSION['cart'][$itemId])) {
        unset($_SESSION['cart'][$itemId]);
    }
    header("Location: main.php");
    exit();
}
?>