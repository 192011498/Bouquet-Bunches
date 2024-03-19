<?php
session_start();
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "bouquet"; 

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_SESSION['shopname'])) {
    $shopname = $_SESSION['shopname'];
} else {
    // Handle case where shopname is not set in session
    // You may redirect the user or set a default shopname
}

// Prepare SQL query with a WHERE clause to filter by shopname
$Query = "SELECT * FROM leafs WHERE shopname = ? AND availabilty=1";
$stmt = $conn->prepare($Query);
$stmt->bind_param("s", $shopname);
$stmt->execute();
$Results = $stmt->get_result();

$ListArray = array();

if ($Results->num_rows > 0) {
    while ($record = $Results->fetch_assoc()) {
        $data = array();
        $data["id"] = $record["id"];
        $data["name"] = $record["flower_name"];
        $data["url"] = "images/" . $record["image_name"];
        $data['subUrl'] = "images/" . $record["image_name"];
        $data["amount"] = $record["price"];
        
        array_push($ListArray, $data);
    }
}

$Response = json_encode($ListArray, true);

echo $Response;
exit;
?>
