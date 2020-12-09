<?php
if(isset($_SESSION['Name'])){

    header('location: ../../../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset your password</title>
</head>
<body>

    New Password:
    <input type="password" name="" id="" placeholder="">
    Re-enter the Password:
    <input type="password" name="" id="" placeholder="">

    
</body>
</html>