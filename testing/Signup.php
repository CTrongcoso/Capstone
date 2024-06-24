<?php 
$servername = "localhost";
$dbname = "Accounts";
$dbusername = "root";
$dbpassword = "";

$con = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_POST['Email'];
        $firstname = $_POST['Firstname'];
        $lastname = $_POST['Lastname'];
        $phonenumber = $_POST['Phonenumber'];
        $pass = ['Password'];
        $passconfirm = "Confirm_Password";

        if($pass != $passconfirm){
             $response['error'] = "Error:  Password is not the same";
        }else{
            $stmt->bind_param("sss", $email, $firstname, $lastname,  $phonenumber,   $pass);
            $stmt = $con->prepare("INSERT INTO Accounts (Email, Firstname, Lastname, Phonenumber, Password) VALUES (?, ?, ?, ?, ?)");

            if($stmt->execute()) {
                $response['sucess'] = true;
            }else{
                $response['error'] = "Error: " . $stmt->error;
            }
            $stmt->close();
            }
        $conn->close();
        } else {
            $response['error'] = "Invalid request method.";
        }
?>