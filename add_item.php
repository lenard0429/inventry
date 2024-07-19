// add_item.php
$servername = getenv('localhostT');
$username = getenv('root');
$password = getenv('""');
$dbname = getenv('inventory_db');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Log connection success
error_log("Database connected successfully");


$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$sql = "INSERT INTO items (name, quantity, price) VALUES ('$name', '$quantity', '$price')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
