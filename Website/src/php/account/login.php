<?php
	$page='account';
    include "../../database/connector.php";
    include "../../../config/csslinker.php";
    include "../../../config/confignavbar.php";
    require('./action/functions.inc.php');

    if(isset($_SESSION['Auth'])){
        header('location: home');
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['user']))
        {
            $username = $_POST['Username'];
            $pass = $_POST['Password'];
            if(emptyInputSignIn($username, $pass) !== false){
                header("location: login?err_bfg=cf5671a160460498c0e270f610badc00261d3e1c14cfdf32a2e9580d4a368c59"); // Empty fields detected
                exit();
            }
            LoginUser($db, $username, $pass);
        }
        else{
            header('Location: login?err_bfg=ab827e3fe17da220a9a652087a35d20adda002aa4df887c5d813b2b1e95228f9');
            exit();
        }

    }

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $websitename ?></title>
        <meta name="description" content="">
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
                                    <div class="col-md-9 col-lg-8 mx-auto" style="user-select: none;">
                                        <h3 class="login-heading mb-4" style="color: black; text-align: center;">Welcome back!</h3>

                                        <form method="POST" action="">

                                            <div class="form-label-group mb-2">
                                                <label for="inputUsername" style="color: black;">Username</label>
                                                <input type="text" name="Username" id="Username" class="form-control" placeholder="Username" required autofocus>
                                            </div>
                                            <div class="form-label-group">
                                                <label for="inputPassword" style="color: black;">Password</label>
                                                <input type="password" name="Password" id="Password" class="form-control" placeholder="Password" required>
                                            </div>
                                            <br>
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                                <label class="custom-control-label" for="remember" style="color: black;">Remember password</label>
                                            </div>
                                            <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" name="user" id="user" type="submit">Sign in</button>
                                            <div class="text-center">
                                                <a class="small font-weight-bold" href="forgotpassword" style="color: black;">Forgot password?</a>
                                            </div>

                                            <?php

                                                if(isset($_GET["err_bfg"])){
                                                    if($_GET["err_bfg"] == "b1cee23b77a7b3dc524f3f0831399e50b7434b63a463992245d96ec4c961eaf9"){ // Error stmt
                                                        echo '<script type="text/javascript">alert("Something went wrong.")</script>';
                                                    }
                                                }
                                                if(isset($_GET["err_bfg"])){
                                                    if($_GET["err_bfg"] == "cf5671a160460498c0e270f610badc00261d3e1c14cfdf32a2e9580d4a368c59"){ // Empty fields detected
                                                        echo '<br><p class="text-danger">Don\'t put empty fields</p>';
                                                    }
                                                }
                                                if(isset($_GET["err_bfg"])){
                                                    if($_GET["err_bfg"] == "1fed2ba905f75e75c08ef77777aa79486eb904147e3a04ca494e93eca311dd7f"){ // username does not exist
                                                        echo '<br><p class="text-danger">Username does not exist</p>';
                                                    }
                                                }
                                                if(isset($_GET["err_bfg"])){
                                                    if($_GET["err_bfg"] === "0f6f5a296925b00f03a4801537bedc5f83cd826d99b81a92e476c3a9b9432266"){ // login error detected
                                                        echo '<br><p class="text-danger">Invalied login information</p>';
                                                    }
                                                }
                                                if(isset($_GET["err_bfg"])){
                                                    if($_GET["err_bfg"] == "ab827e3fe17da220a9a652087a35d20adda002aa4df887c5d813b2b1e95228f9"){ // Something went wrong
                                                        echo '<br><p class="text-danger">Something went wrong</p>';
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
        </div>

        <?php include "../../../config/jslinker.php"; ?>
    </body>
</html>