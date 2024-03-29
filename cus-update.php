<?php
// Include your database configuration file
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $id = $_POST['id'];
    $newEmail = isset($_POST['email']) ? $_POST['email'] : null;
    $newPhoneNumber = isset($_POST['phone_number']) ? $_POST['phone_number'] : null;
    
    // Check if a new photo is uploaded
    if (isset($_FILES['photo']['tmp_name']) && !empty($_FILES['photo']['tmp_name'])) {
        $newPhoto = file_get_contents($_FILES['photo']['tmp_name']);
    } else {
        // If no new photo is uploaded, use the current photo
        $current_photo = isset($_POST['current_photo']) ? base64_decode($_POST['current_photo']) : null;
        $newPhoto = $current_photo;
    }
    
    $address = isset($_POST['address']) ? $_POST['address'] : null;

    // Build the SQL query based on provided parameters
    $query = "UPDATE signup SET ";
    $params = array();

    if (!is_null($newEmail)) {
        $query .= "email = ?, ";
        $params[] = $newEmail;
    }

    if (!is_null($newPhoneNumber)) {
        $query .= "phone_number = ?, ";
        $params[] = $newPhoneNumber;
    }

    if (!is_null($newPhoto)) {
        $query .= "photo = ?, ";
        $params[] = $newPhoto;
    }

    if (!is_null($address)) {
        $query .= "address = ?, ";
        $params[] = $address;
    }

    // Remove the trailing comma and space
    $query = rtrim($query, ", ");

    // Add the WHERE clause
    $query .= " WHERE id = ?";
    $params[] = $id;

    // Prepare the SQL query
    $stmt = $conn->prepare($query);

    // Check for errors in statement preparation
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    // Dynamically bind parameters
    $types = str_repeat('s', count($params));

    // Check for errors in parameter binding
    if (!$stmt->bind_param($types, ...$params)) {
        die("Error binding parameters: " . $stmt->error);
    }

    // Execute the SQL query
    if ($stmt->execute()) {
        // Redirect to the profile page
        header("Location: profile.php");
        exit();
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request method.";
}

// Close the database connection
$conn->close();
?>
