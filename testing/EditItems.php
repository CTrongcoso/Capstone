<?php 
$servername = "localhost";
$dbname = "Inventory";
$dbusername = "root";
$dbpassword = "";

$con = new mysqli($servername, $dbusername, $dbpassword, $dbname);


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $updateditemname = $_POST['UpdatedItemname'];
    $updateditemimage = $_POST['UpdatedItemimgpath'];
    $updateddescription = $_POST['UpdatedDescription'];
    $updatedstock = $_POST['UpdatedStock'];
    $updated = $_POST['Updatedat'];


            $stmt->bind_param("sss", $updateditemname, $updateditemimage, $updateddescription,  $updatedstock, $updated);
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