<?php
include 'db_connection.php';

$id = $_GET['id'];

$query = "DELETE FROM Inventory WHERE ID = ?";
$params = array($id);
$stmt = sqlsrv_query($conn, $query, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
