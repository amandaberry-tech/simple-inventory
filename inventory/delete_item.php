<?php
$connection = new mysqli('localhost', 'root', '', 'inventory_management');
$id = $_GET['id'];
$connection->query("DELETE FROM inventory WHERE id = $id");
?>
