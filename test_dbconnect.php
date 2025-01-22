<?php
$serverName = "localhost"; // or your SQL Server's host
$connectionOptions = [
    "Database" => "InventoryManagement",
    "Uid" => "aberry",
    "PWD" => "password"
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "SQLSRV Connection Successful!";
}

sqlsrv_close($conn);
?>
