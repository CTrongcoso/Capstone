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
        
        //verifying the unique email
        $verify_query = mysqli_query($con,"SELECT Email FROM Accounts WHERE Email='$email'");
        if(mysqli_num_rows($verify_query)!=0){
            echo"<div class ='message'>
                    <p>This email is used, Try Another One Please! </p>
                    </div>";
        }elseif($pass != $passconfirm){
            echo"<div class ='message'>
                    <p>The Password is not the same with Confirm Password</p>
                    </div>";
        }else{
            mysqli_query($con, "INSERT INTO Accounts(Email,Firstname,Lastname,Phonenumber,Password) VALUES('$email','$firstname','$lastname','$phonenumber','$pass')") or die("Error Occured");
        }


        $conn->close();
        } else {
            $response['error'] = "Invalid request method.";
        }
?>