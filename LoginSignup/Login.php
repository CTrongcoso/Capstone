<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Login.css">
    <title>Log in to Hairtage Salon</title>
</head>
<body>

<!-- error in connecting to the database -->
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST["Username"];
        $password = $_POST["Password"];

        $servername = "localhost";
        $dbname = "users";
        $dbusername = "root";
        $dbpassword = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "
                SELECT * FROM accounts
                WHERE Email = :login OR Phonenumber = :login
            ";

            $stmt = $conn->prepare($query);
            $stmt->bindValue(":login", $login, PDO::PARAM_STR);
            $stmt->execute();
            //bug problem
            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if (isset($row['Password']) && password_verify($password, $row['Password'])) {
                    header("Location: HomePage.html");
                    exit;
                } else {
                    echo "<div class='message'>
                    <p>Password Incorrect!</p>
                  </div>";
                }
            } else {
                echo "<div class='message'>
                <p>Username or Email not found</p>
              </div>";
            }
        } catch (PDOException $e) {
            $response['error'] = "Error: " . $e->getMessage();
        }
    }
    ?>

    <div class="container">
        <div class="Content">
            <div class="HairytageLogo">
                <img src="" alt="Hairytagelogo.jpg">
            </div>
            <div class="LoginTag">
                <p>LOG IN</p>
            </div>
            <div class="userinputed">
                <div class="Username">
                    <form  method="POST" action="">
                        <label for="Username">Email or Phone Number</label>
                        <input type="text" id="Username" name="Username" required>
                </div>
                <div class="Password">
                    <label for="Password">Password</label>
                    <input type="password" id="Password" name="Password" required>
                </div>
                <div class="ForgotPassword">
                    <a href="">Forgot your password?</a>
                </div>
                <div class="LoginBtn">
                <button type="submit" id="LoginBtn">Log In</button>
                </div>
                <div class="NoAccount">
                    <p>You don't have an account? <a href="Signup.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>