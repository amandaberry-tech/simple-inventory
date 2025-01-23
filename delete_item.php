<?php
$serverName = "localhost";
$connectionOptions = [
    "Database" => "InventoryManagement",
    "Uid" => "aberry",
    "PWD" => "password"
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if ($id === null || !is_numeric($id)) {
        echo json_encode(["success" => false, "message" => "Invalid ID provided."]);
        exit;
    }

    $query = "DELETE FROM Inventory WHERE ID = ?";
    $params = array($id);
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        echo json_encode(["success" => false, "message" => print_r(sqlsrv_errors(), true)]);
        exit;
    }

    echo json_encode(["success" => true, "message" => "Item deleted successfully."]);
    sqlsrv_free_stmt($stmt);
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
sqlsrv_close($conn);
?>