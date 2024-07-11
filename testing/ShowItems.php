<?php
// galing to na function sa web namin e na bookhub
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize response array
$response = ['success' => false];

// SQL query to select all books
$sql = "SELECT * FROM Inventory";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $Items = [];
    // Fetch each row as an associative array
    while ($row = $result->fetch_assoc()) {
        // Add the row to the books array
        $Items[] = $row;
    }
    // Set success to true and add books to the response
    $response['success'] = true;
    $response['Items'] = $Items;
} else {
    // If no books found, set error message
    $response['error'] = "No books found.";
}

// Close database connection
$conn->close();

// Encode response array as JSON and output
echo json_encode($response);
?>
