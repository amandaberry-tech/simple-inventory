<?php
$connection = new mysqli('localhost', 'root', '', 'inventory_management');
$result = $connection->query('SELECT * FROM inventory ORDER BY added_on DESC');
$items = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($items);
?>
