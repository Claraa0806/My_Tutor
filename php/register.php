<?php

if (isset($_POST['register'])) {
    include_once("dbconnect.php");
    {
        $id = $_POST['id'];
        $email = $_POST["email"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $password = sha1($_POST["password"]);
        $address = $_POST["address"];
   
        echo  "$email, $name, $phone,$password, $address";

        $sqlregister = "INSERT INTO `registration`( `id`,`email`, `name`, `phone`, `password`, `address`) VALUES('$id','$email', '$name', '$phone', '$password', '$address')";
        try {
            
            $conn->exec($sqlregister);
            $last_id = $conn->lastInsertId();
            uploadImage($last_id);
            echo "<script>alert('Registration successful')</script>";
            echo "<script>window.location.replace('../php/login.php')</script>";
        } catch (PDOException $e) {
            echo "<script>alert('Registration failed')</script>";
            echo "<script>window.location.replace('../php/register.php')</script>";
        }
    }
}
function uploadImage($id)
{
    $target_dir = "../image/users/";
    $target_file = $target_dir . $id . ".png";
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="../js/script.js" defer></script>
</head>
<body>
    <header class="w3-header w3-teal w3-center w3-padding-16">
        <h2>Welcome to MyTutor</h2>
    </header>
    <div style="display:flex; float: left; margin-top: 5%;">
        <div class="w3-container w3-padding w3-margin w3-center" style="width:500px;margin:auto;">
        <img class="imgselection" src="../image/register.png" style="width: 50%;">
        <input type="file" onchange="previewFile()" name="fileToUpload" id="fileToUpload">
        <h2>Registration Page</h2>
        </div>
    </div>
    <div style="display:flex; justify-content: right; margin-bottom: 5%;">
        <div class="w3-container w3-card w3-padding w3-margin" style="width:1000px;margin:auto;text-align:left;">
            <form name="registerForm" action="register.php" method="post">
                <div class="container">
                    <p>
                        <label><b>Email</b></label>
                        <input class="w3-input w3-round w3-border" type="email" name="email" id="email" placeholder="Your email" required>
                    </p>
                    <p>
                        <label><b>Name</b></label>
                        <input class="w3-input w3-round w3-border" type="name" name="name" id="name" placeholder="Your name" required>
                    </p>
                    <p>
                        <label><b>Phone number </b></label>
                        <input class="w3-input w3-round w3-border" type="phone" name="phone" id="phone" placeholder="Your phone number" required>
                    </p>
                    <p>
                        <label><b>Password</b></label>
                        <input class="w3-input w3-round w3-border" type="text" name="password" id="password" placeholder="Your password" required>
                    </p>
                    <p>
                        <label><b>Home address</b></label>
                        <input class="w3-input w3-round w3-border" type="address" name="address" id="address" placeholder="Your home address" required>
                    </p>
                    </div>
                    <div class="w3-center">
                    <p>
                        <input class="w3-button w3-round-large w3-border w3-border-black w3-teal" type="submit" name="register" id="register" value="Register" onsubmit="return confirmDialog()">
                    </p>
            </form>
        </div>
    </div>
    <footer class="w3-container w3-teal w3-center w3-bottom">
        <p>Already have a account? <a href="login.php"> Login</a>.</p>
    </footer>

</body>
</html>