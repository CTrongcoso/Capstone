<?php
$servername = "localhost"; 
$dbname = "Appointments";
$dbusername = "root"; 
$dbpassword = ""; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$response = ['success' => false];


$sql = "SELECT * FROM Appointments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $Appointments = [];
   
    while ($row = $result->fetch_assoc()) {
       
        $Appointments[] = $row;
    }

    $response['success'] = true;
    $response['Appointments'] = $Appointments;
} else {

    $response['error'] = "No Appointments found.";
}


$conn->close();
?>