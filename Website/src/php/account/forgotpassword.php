<?php
	$page='account';
    include "../../database/connector.php";
    include "../../../config/csslinker.php";
    include "../../../config/confignavbar.php";
    include "../include/navbar/navbar.inc.php";

    if(isset($_SESSION['Auth'])){
        header('location: home');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        if(isset($_GET["action"])){
            if($_GET["action"] == 'tokensuccess'){
                echo '<title>Reset Password</title>';
            }
        }
        if(isset($_GET["action"])){
            if($_GET["action"] == 'emailsent'){
                echo '<title>Email Sent</title>';
            }
        }
        else{
            echo '<title>Forgot Password</title>';
        }
    ?>
</head>
<body>

<style>
    .resetpanel{
            margin-top: 220px;
            margin-left: 300px;
            margin-right: 300px;
    }
    @media (max-width: 992px) {
        .resetpanel{
            margin-top: 220px;
            margin-left: 200px;
            margin-right: 200px;
        }
    }
    @media (max-width: 800px) {
        .resetpanel{
            margin-top: 220px;
            margin-left: 45px;
            margin-right: 45px;
        }
    }
    @media (max-width: 700px) {
        .resetpanel{
            margin-top: 220px;
            margin-left: 40px;
            margin-right: 40px;
        }
    }
    @media (max-width: 500px) {
        .resetpanel{
            margin-top: 220px;
            margin-left: 50px;
            margin-right: 50px;
        }
    }
    @media (max-width: 350px) {
        .resetpanel{
            margin-top: 220px;
            margin-left: 20px;
            margin-right: 20px;
        }
    }

</style>

    <div class="container">
        <?php

            if(isset($_GET["action"])){
                if($_GET["action"] == 'tokensuccess'){

                    $selector = $_GET["selector"];
                    $validator = $_GET["validator"];

                    if(empty($selector) || empty($validator)){
                        header('location: 404');
                    }
                    else{
                        if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){

                            ?>
                                <section class="mb-5 text-center">
                                    <div class="resetpanel">
                                        <p class="font-weight-bold" style="font-size: 30px;">Forgot Password</p>

                                        <form action="" method="POST">

                                            <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                                            <input type="hidden" name="validator" value="<?php echo $validator; ?>">

                                            <div class="md-form md-outline">
                                                <input type="password" name="newPassword" id="newPass" class="form-control" autofocus autocomplete="FALSE">
                                                <label data-error="wrong" data-success="right" for="newPass" style="user-select: none;">New password</label>
                                            </div>

                                            <div class="md-form md-outline">
                                                <input type="password" name="newPasswordConfirm" id="newPassConfirm" class="form-control" autocomplete="FALSE">
                                                <label data-error="wrong" data-success="right" for="newPassConfirm" style="user-select: none;">Confirm password</label>
                                            </div>

                                            <button type="submit" name="reset-password-now" class="btn btn-primary mb-4 rounded font-weight-normal">Reset password</button>

                                        </form>

                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <a href="login" class="font-weight-bold">Back to Log In</a>
                                            <a href="register" class="font-weight-bold">Register</a>
                                        </div>
                                    </div>
                                </section>

                            <?php

                        }
                    }

                }

            }
            elseif(isset($_GET["action"])){
                if($_GET["action"] == "5dcaac2c2f626716aa1ed70bd364637e8646f6dd73312371ca0704ea9109746d"){
                    echo '<p class="text-success text-uppercase">Email Seent Successfull</p><br/><a href="home" class="btn btn-dark mt-4 rounded">Back to home page</a>';
                    
                }

            }
            else{
                ?>

                    <section class="mb-5 text-center">
                        <div class="resetpanel">
                            <p class="font-weight-bold" style="font-size: 30px;">Forgot Password</p>
                            <form action="#!" method="POST">
                                <div class="md-form md-outline">
                                    <input type="email" id="email" class="form-control" autofocus autocomplete="FALSE">
                                    <label data-error="wrong" data-success="right" for="newPass" style="user-select: none;">Email address</label>
                                </div>
                                <button type="submit" class="btn btn-primary mb-4 rounded font-weight-normal">Change password</button>
                            </form>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <a href="login" class="font-weight-bold">Back to Log In</a>
                                <a href="register" class="font-weight-bold">Register</a>
                            </div>
                        </div>
                    </section>

                <?php

            }

        ?>
    </div>

</body>
</html>