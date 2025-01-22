<?php
phpinfo();
?>
<?php
$serverName = "localhost";
$connectionOptions = [
    "Database" => "InventoryManagement",
    "Uid" => "aberry",
    "PWD" => "password"
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die("Connection failed: " . print_r(sqlsrv_errors(), true));
}

$query = "SELECT * FROM inventory";
$stmt = sqlsrv_query($conn, $query);

if ($stmt === false) {
    die("Query failed: " . print_r(sqlsrv_errors(), true));
}

$items = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $items[] = $row;
}

header('Content-Type: application/json');
echo json_encode($items);

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
