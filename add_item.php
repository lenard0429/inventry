<?php
$servername = getenv('localhost');
$username = getenv('root');
$password = getenv('""');
$dbname = getenv('inventory_db');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

error_log("Database connected successfully");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemName = $_POST['item_name'];
    $itemQuantity = $_POST['item_quantity'];

    error_log("Received item name: $itemName");
    error_log("Received item quantity: $itemQuantity");

    $sql = "INSERT INTO items (name, quantity) VALUES ('$itemName', '$itemQuantity')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
