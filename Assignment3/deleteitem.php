<?php
session_start();

// Coffee and tea items
$items = array(
    array('id' => 1, 'name' => 'Espresso', 'type' => 'Coffee'),
    array('id' => 2, 'name' => 'Cappuccino', 'type' => 'Coffee'),
    array('id' => 3, 'name' => 'Green', 'type' => 'Tea'),
    array('id' => 4, 'name' => 'Chamomile', 'type' => 'Tea')
);


// Remove item to cart
if (isset($_POST['remove_from_cart'])) {
    $itemId = intval($_POST['item_id']);

    if (isset($_SESSION['cart'][$itemId])) {
        unset($_SESSION['cart'][$itemId]);
    }
    header("Location: index.php");
    exit();
}
?>