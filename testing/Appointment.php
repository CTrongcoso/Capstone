<?php 
$servername = "localhost";
$dbname = "Appointments";
$dbusername = "root";
$dbpassword = "";

$con = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $date = $_POST['Date'];
        $time = $_POST['Time'];
        $typeservices = $_POST['TypeService'];
        $employee = $_POST['Employee'];



        if($pass != $passconfirm){
             $response['error'] = "Error:  Password is not the same";
        }else{
            $stmt->bind_param("sss",  $date, $time, $typeservices,   $employee ,);
            $stmt = $con->prepare("INSERT INTO Appointments (Date, Time, TypeService, Employee,) VALUES (?, ?, ?, ?)");

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