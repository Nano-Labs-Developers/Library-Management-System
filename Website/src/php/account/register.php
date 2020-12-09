<?php

    $page='account';
    include "../../database/connector.php";
    include "../../../config/csslinker.php";
    include "../../../config/confignavbar.php";
    require('./action/functions.inc.php');

    if (isset($_POST['register']))
    {
        $name = $_POST['inputName'];
        $username = $_POST['inputUsername'];
        $email = $_POST['inputEmail'];
        $pass = $_POST['inputPassword'];
        $contact = $_POST['inputContactNo'];

        if(emptyInputSignUp($name, $username, $email, $pass, $contact) !== false){
            header("location: register?err_bfg=cf5671a160460498c0e270f610badc00261d3e1c14cfdf32a2e9580d4a368c59"); // Empty fields detected
            exit();
        }
        if(invalidUsername($username) !== false){
            header("location: register?err_bfg=df2c2b648aa86ea65afd3dcd9c74cd3bdac4f2eeb1d8ef518382e4225af362b2"); // Invalied Username detected
            exit();
        }
        if(invalidEmail($email) !== false){
            header("location: register?err_bfg=d47866657f4123b53ee1830172d398559c8fb733d27762da19d7ca36fc13e645"); // Invalid Email detected
            exit();
        }
        if(UsernameExist($username, $db) !== false){
            header("location: register?err_bfg=4b441fc8a3f7b955151d21108b26ba930776519b7b0a66fb4dea872ac108d877"); // Username already exist
            exit();
        }
        if(EmailExist($email, $db) !== false){
            header("location: register?err_bfg=ca775dd30315b6bdcb09bb93fa6d0d12b07436a867de6fdfe690759ae3132d14"); // Email already exist
            exit();
        }

        CreatUser($name, $username, $email, $pass, $contact, $user_perm, $db);

    }

?>

<?php
if(isset($_SESSION['Name'])){
    header('location: home');
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $websitename ?></title>
        <meta name="robots" content="noarchive">
        <meta name="author" content="BlackCAT#0707">
        <meta name="description" content="fjyjd">
        <meta name="keywords" content="jfydjdj">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    </head>
    <body style="overflow: hidden;">
        <?php include "../include/navbar/navbar.inc.php"; ?>
        <div class="container-fluid">
            <div class="row no-gutter" style="background: linear-gradient(-70deg, #e8e8e8 40%, rgba(0, 0, 0, 0) 70%), url('https://i.imgur.com/BiQhRbg.jpg'); padding-bottom: 100%;">
                <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                    <div class="col-md-8 col-lg-6">
                        <div class="login d-flex align-items-center py-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9 col-lg-8 mx-auto">
                                        <h3 class="login-heading mb-4" style="color: black; text-align: center; user-select: none;">Welcome back!</h3>
                                        <form method="POST" action="">
                                            <div class="form-label-group">
                                                <label for="inputName" style="color: black; user-select: none;">Name</label>
                                                <input type="text" id="inputName" name="inputName" class="form-control" placeholder="Your Name" required autofocus>                        
                                            </div>

                                            <div class="form-label-group">
                                                <label for="inputUsername" style="color: black; user-select: none;">Username</label>
                                                <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Username" required>                        
                                            </div>

                                            <div class="form-label-group">
                                                <label for="inputEmail" style="color: black; user-select: none;">Email address</label>
                                                <input type="email" id="inputEmail" name="inputEmail" class="form-control email-field" placeholder="Email address" required>                        
                                            </div>
                        
                                            <div class="form-label-group">
                                                <label for="inputPassword" style="color: black; user-select: none;">Password</label>
                                                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>                        
                                            </div>

                                            <div class="form-label-group">
                                                <label for="inputContactNo" style="color: black; user-select: none;">Contact Number</label>
                                                <input type="number" id="inputContactNo" name="inputContactNo" class="form-control" placeholder="Contact Number" required>                        
                                            </div>
                        
                                            <div class="custom-control custom-checkbox mb-3 mt-3">
                                                <input type="checkbox" class="custom-control-input" id="agree" required>
                                                <label class="custom-control-label" for="agree" style="color: black; user-select: none;">I agree to the <a href="../pages/t&c/termsandconditions.php" target="blank">terms and conditions</a></label>
                                            </div>
                                            <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" name="register" type="submit">Register</button>
                        
<?php

    if(isset($_GET["err_bfg"])){
        if($_GET["err_bfg"] == "b1cee23b77a7b3dc524f3f0831399e50b7434b63a463992245d96ec4c961eaf9"){ // Error stmt
            echo '<script type="text/javascript">alert("Something went wrong.")</script>';
        }
    }
    if(isset($_GET["err_bfg"])){
        if($_GET["err_bfg"] == "cf5671a160460498c0e270f610badc00261d3e1c14cfdf32a2e9580d4a368c59"){ // Empty fields detected
            echo '<p class="text-danger">Don\'t put empty fields</p>';
        }
    }
    if(isset($_GET["err_bfg"])){
        if($_GET["err_bfg"] == "df2c2b648aa86ea65afd3dcd9c74cd3bdac4f2eeb1d8ef518382e4225af362b2"){ // Invalied Username detected
            echo '<p class="text-danger">Invalied Username</p>';
        }
    }
    if(isset($_GET["err_bfg"])){
        if($_GET["err_bfg"] == "d47866657f4123b53ee1830172d398559c8fb733d27762da19d7ca36fc13e645"){ // Invalid Email detected
            echo '<p class="text-danger">Invalid Email</p>';
        }
    }
    if(isset($_GET["err_bfg"])){
        if($_GET["err_bfg"] == "4b441fc8a3f7b955151d21108b26ba930776519b7b0a66fb4dea872ac108d877"){ // Username already exist
            echo '<p class="text-danger">Enterd username already exist</p>';
        }
    }
    if(isset($_GET["err_bfg"])){
        if($_GET["err_bfg"] == "ca775dd30315b6bdcb09bb93fa6d0d12b07436a867de6fdfe690759ae3132d14"){ // Email already exist
            echo '<p class="text-danger">Enterd email already exist</p>';
        }
    }

?>
                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "../../../config/jslinker.php"; ?>
    </body>
</html>