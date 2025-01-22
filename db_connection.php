<?php
$serverName = "localhost"; // or your server name
$connectionOptions = array(
    "Database" => "InventoryManagement", // Replace with your database name
    "Uid" => "aberry", // Replace with your SQL Server username
    "PWD" => "password"  // Replace with your SQL Server password
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
