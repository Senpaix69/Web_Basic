<?php
session_start();
// Coffee and tea items
$items = array(
    array('id' => 1, 'name' => 'Espresso', 'type' => 'Coffee'),
    array('id' => 2, 'name' => 'Cappuccino', 'type' => 'Coffee'),
    array('id' => 3, 'name' => 'Green', 'type' => 'Tea'),
    array('id' => 4, 'name' => 'Chamomile', 'type' => 'Tea')
);

// Add item to cart
if (isset($_POST['add_to_cart'])) {
    $itemId = intval($_GET['id']);
    $quantity = $_POST['quantity'];

    //Check if item already exists in cart
    if (isset($_SESSION['cart'][$itemId])) {
        $_SESSION['cart'][$itemId]['quantity'] = $quantity;
    } else {
        $_SESSION['cart'][$itemId] = [
            'item_id' => $itemId,
            'name' => $items[$itemId - 1]['name'],
            'type' => $items[$itemId - 1]['type'],
            'quantity' => $quantity
        ];
    }

    header("Location: index.php");
    exit();
}
?>