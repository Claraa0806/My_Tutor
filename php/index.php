<?php
session_start();
$email = $_SESSION['email']; 

if (!isset($_SESSION['sessionid'])){
    echo "<script>alert('Session not available. Please login');</script>";
    echo "<script>window.location.replace(login.php')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="../js/menu.js" defer></script>

    <title>Profile</title>
</head>
<body>
    <header class="w3-header w3-teal w3-center w3-padding-16">
        <h2>My Profile</h2>
        <div style="display:flex; justify-content: right;">
    <p><a href="register.php"> Logout </a></p>
    </div>
    </header>
    <div style="display:flex; justify-content: center;">
        <div class="w3-container w3-card w3-padding w3-margin" style="width:1000px;margin:auto;text-align:left;">
            <form name="indexForm" action="index.php" method="post">
                <div class="container">
                <div style="font-weight:bold">Email : <?php echo $email?> </div>
            </form>
        </div>
    </div>
    <footer class="w3-footer w3-center w3-bottom w3-teal">MyTutor</footer>
</body>

</html>