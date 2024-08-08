<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $servername = "localhost"; 
    $dbname = "login";
    $dbusername = "root"; 
    $dbpassword = ""; 

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT email,password FROM Accounts WHERE email = :Email AND password = :Password");
        $stmt->bindParam(':Email', $username);
        $stmt->bindParam(':Password', $password);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $response['sucess'] = true;
        } else {
            $response['error'] = "Error:  Password or Username is Incorrect";
        }
    } catch (PDOException $e) {
        $response['error'] = "Error: " . $stmt->$error;
    }
}
?>
