<?php 
$servername = "localhost";
$dbname = "Inventory";
$dbusername = "root";
$dbpassword = "";

$con = new mysqli($servername, $dbusername, $dbpassword, $dbname);


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $itemname = $_POST['Itemname'];
    $itemimage = $_POST['Itemimgpath'];
    $description = $_POST['Description'];
    $stock = $_POST['Stock'];
    $created = $_POST['Createdat'];
    $updated = $_POST['Updatedat'];


            $stmt->bind_param("sss", $itemimage, $itemname, $description,  $stock,   $created, $updated);
            $stmt = $con->prepare("INSERT INTO Inventory (Itemimgpath, Itemname, Description, Stock, Createdat,Updatedat) VALUES (?, ?, ?, ?, ?, ?)");

            if($stmt->execute()) {
                $response['sucess'] = true;
            }else{
                $response['error'] = "Error: " . $stmt->error;
            }
            $stmt->close();
            
        $conn->close();
            $response['error'] = "Invalid request method.";
    }
?>