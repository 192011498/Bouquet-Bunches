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

// Check if shopname is set in session
if(isset($_SESSION['shopname'])) {
    $shopname = $_SESSION['shopname'];
} else {
    // Handle case where shopname is not set in session
    // You may redirect the user or set a default shopname
}

$Query = "SELECT * FROM rippen WHERE shopname = ? AND availabilty=1";
$stmt = $conn->prepare($Query);
$stmt->bind_param("s", $shopname);
$stmt->execute();
$Results = $stmt->get_result();

$ListArray = array();

if ($Results->num_rows > 0) {
    while($record = $Results->fetch_assoc()) {
        $data = array();
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
