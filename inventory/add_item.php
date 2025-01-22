<?php
$connection = new mysqli('localhost', 'root', '', 'inventory_management');
$item_name = $_POST['item_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$query = $connection->prepare('INSERT INTO inventory (item_name, quantity, price) VALUES (?, ?, ?)');
$query->bind_param('sii', $item_name, $quantity, $price);
$query->execute();
?>
