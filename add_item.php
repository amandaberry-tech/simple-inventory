<?php
$serverName = "localhost";
$connectionOptions = [
    "Database" => "InventoryManagement",
    "Uid" => "aberry",
    "PWD" => "password"
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(json_encode(["error" => sqlsrv_errors()]));
}

// Get data from POST request
$itemName = $_POST['item_name'];
$quantity = (int)$_POST['quantity'];
$price = (float)$_POST['price'];

// Check if ItemName already exists in the database
$checkQuery = "SELECT Quantity FROM inventory WHERE ItemName = ?";
$params = [$itemName];
$checkStmt = sqlsrv_query($conn, $checkQuery, $params);

if ($checkStmt === false) {
    die(json_encode(["error" => sqlsrv_errors()]));
}

if (sqlsrv_fetch($checkStmt)) {
    // Update existing row's quantity
    $currentQuantity = sqlsrv_get_field($checkStmt, 0);
    $newQuantity = $currentQuantity + $quantity;

    $updateQuery = "UPDATE inventory SET Quantity = ? WHERE ItemName = ?";
    $updateParams = [$newQuantity, $itemName];
    $updateStmt = sqlsrv_query($conn, $updateQuery, $updateParams);

    if ($updateStmt === false) {
        die(json_encode(["error" => sqlsrv_errors()]));
    }

    echo json_encode(["success" => true, "action" => "updated", "newQuantity" => $newQuantity]);
} else {
    // Insert new row
    $insertQuery = "INSERT INTO inventory (ItemName, Quantity, Price) VALUES (?, ?, ?)";
    $insertParams = [$itemName, $quantity, $price];
    $insertStmt = sqlsrv_query($conn, $insertQuery, $insertParams);

    if ($insertStmt === false) {
        die(json_encode(["error" => sqlsrv_errors()]));
    }

    echo json_encode(["success" => true, "action" => "inserted"]);
}

sqlsrv_close($conn);
?>
