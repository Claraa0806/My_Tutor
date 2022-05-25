<?php
include("DBConnection.php"); // include the connection object from the DBConnection.php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
$inEmail = $_POST["email"];
$inName = $_POST["name"];
$inPhone = $_POST["phone_number"];
$inPassword = $_POST["password"];
$inAddress = $_POST["address"];
$encryptPassword = password_hash($inPassword, PASSWORD_DEFAULT);
$stmt = $db->prepare("INSERT INTO REGISTRATION(EMAIL, NAME, PHONE_NUMBER, PASSWORD, ADDRESS) VALUES(?, ?, ?, ?,?)");
$stmt->bind_param("sssss", $inEmail, $inName, $inPhone, $encryptPassword, $inAddress);
$stmt->execute();
$result = $stmt->affected_rows;
$stmt -> close();
$db -> close(); 
if($result > 0)
{
header("location: login.php"); // user will be taken to the success page
}
else
{
echo "Oops. Something went wrong. Please try again"; 
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="../js/script.js" defer></script>
</head>
<body onload="loadUser()">
    <header class="w3-header w3-teal w3-center w3-padding-16">
        <h2>Welcome to MyTutor</h2>
    </header>
    <div style="display:flex; float: left; margin-top: 5%;">
        <div class="w3-container w3-padding w3-margin w3-center" style="width:500px;margin:auto;">
        <img src="../image/register.png" alt="Avatar" class="w3-image" style="width: 50%;">
        <h2>LRegistration Page</h2>
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
                        <input class="w3-input w3-round w3-border" type="password" name="password" id="pass" placeholder="Your password" required>
                    </p>
                    <p>
                        <input class="w3-check" name="showpass" type="checkbox" id="show" onclick="showPass()">
                        <label>Show password</label>
                    </p>
                    <p>
                        <label><b>Home address</b></label>
                        <input class="w3-input w3-round w3-border" type="address" name="address" id="address" placeholder="Your home address" required>
                    </p>
                    </div>
                    <div class="w3-center">
                    <p>
                        <input class="w3-button w3-round-large w3-border w3-border-black w3-teal" type="submit" name="register" id="register" value="Register">
                    </p>
            </form>
        </div>
    </div>
    <footer class="w3-container w3-teal w3-center w3-bottom">
        <p>Already have a account? <a href="login.html"> Login</a>.</p>
    </footer>

</body>
</html>