<?php
$query = "SELECT ID, ItemName, Quantity, Price FROM inventory";
$stmt = sqlsrv_query($conn, $query);

if ($stmt === false) {
    die(json_encode(["error" => "Query execution failed: " . print_r(sqlsrv_errors(), true)]));
}
?>