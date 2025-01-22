<?php
header('Content-Type: application/json');

$serverName = "localhost";
$connectionOptions = [
    "Database" => "InventoryManagement",
    "Uid" => "aberry",
    "PWD" => "password"
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    echo json_encode(["error" => "Database connection failed"]);
    exit; // Stop further execution
}

$query = "SELECT ID, ItemName, Quantity, Price FROM inventory";
$stmt = sqlsrv_query($conn, $query);

if ($stmt === false) {
    echo json_encode(["error" => "Query execution failed"]);
    exit; // Stop further execution
}

$items = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $items[] = [
        "ID" => $row["ID"],
        "ItemName" => $row["ItemName"],
        "Quantity" => $row["Quantity"],
        "Price" => $row["Price"]
    ];
}

echo json_encode($items); // Ensure only JSON output here

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>