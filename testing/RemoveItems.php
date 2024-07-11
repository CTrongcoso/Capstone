<?php
// galing to na function sa web namin e na bookhub
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Inventory";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];

    $stmt = $conn->prepare("DELETE FROM Inventory WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['error'] = "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    $response['error'] = "Invalid request method.";
}

$conn->close();

echo json_encode($response);
?>
