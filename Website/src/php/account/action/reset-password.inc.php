<?php

if(isset($_POST["reset-password-now"])){

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["newPassword"];
    $passwordRepeat = $_POST["newPasswordConfirm"];

    if(empty($selector) || empty($validator) || empty($password) || empty($passwordRepeat)){
        header('location: forgotpassword?err_bsf=cf5671a160460498c0e270f610badc00261d3e1c14cfdf32a2e9580d4a368c59');
        exit();
    }
    elseif($password != $passwordRepeat){
        header('location: forgotpassword?err_bsf=059f08b5897f077a4c63e78db715bb271ba5e3ce3be8494ddfa90bacca02bad9'); // Sorry you entered passwords are not matched
        exit();
    }

    $currentDate = date("U");

    require "../../../database/connector.php";

    $sql = "SELECT * FROM passwordreset WHERE pwdReset_Selector=? AND pwdReset_Expires >= ?;";
    $stmt = mysqli_stmt_init($db);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('location: forgotpassword?err_blm=ab827e3fe17da220a9a652087a35d20adda002aa4df887c5d813b2b1e95228f9'); // Something went wrong.
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if(!$row = mysqli_fetch_assoc($result)){
            header('location: forgotpassword?err_blm=976b1c19844c038262ef115fac8fb2ba567999e5965e3332dd888212225d9fca'); // Re-submit your password reset request.
            exit();
        }
        else{
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdReset_Token"]);

            if($tokenCheck === false){
                header('location: forgotpassword?err_blm=976b1c19844c038262ef115fac8fb2ba567999e5965e3332dd888212225d9fca'); // Re-submit your password reset request.
                exit();
            }
            elseif($tokenCheck === true){
                $tokenEmail = $row["pwdReset_Email"];
                
                $sql = "SELECT * FROM user WHERE user_email=?;";
                $stmt = mysqli_stmt_init($db);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header('location: forgotpassword?err_blm=ab827e3fe17da220a9a652087a35d20adda002aa4df887c5d813b2b1e95228f9'); // Something went wrong.
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    if(!$row = mysqli_fetch_assoc($result)){
                        header('location: forgotpassword?err_blm=ab827e3fe17da220a9a652087a35d20adda002aa4df887c5d813b2b1e95228f9'); // Something went wrong.
                        exit();
                    }
                    else{
                        $sql = "UPDATE user SET user_password=? WHERE user_email=?;";
                        $stmt = mysqli_stmt_init($db);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            header('location: forgotpassword?err_blm=ab827e3fe17da220a9a652087a35d20adda002aa4df887c5d813b2b1e95228f9'); // Something went wrong.
                            exit();
                        }
                        else{
                            $HashNewPassword = password_hash($password, PASSWORD_DEFAULT);

                            mysqli_stmt_bind_param($stmt, "ss", $HashNewPassword, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE FROM passwordreset WHERE pwdReset_Email=?";
                            $stmt = mysqli_stmt_init($db);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                header('location: forgotpassword?err_blm=ab827e3fe17da220a9a652087a35d20adda002aa4df887c5d813b2b1e95228f9'); // Something went wrong.
                                exit();
                            }
                            else{
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);

                                header('location: login?st=730bb6d0089cea9c64036c614dc50c65a66da349f628c77426432f21550fe10e&act=_redirect&lang=en'); // Successful reset password

                            }

                        }

                    }

                }

            }

        }

    }

}
else{
    header('location: home');
    exit();
}