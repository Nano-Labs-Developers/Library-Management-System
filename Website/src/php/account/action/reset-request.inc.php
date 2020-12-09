<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST["reset-request-submit"])){

        $userEmail = $_POST["email"];

        if(empty($userEmail)){
            header('location: forgotpassword?err_bsf=cf5671a160460498c0e270f610badc00261d3e1c14cfdf32a2e9580d4a368c59'); // Empty fields detected
            exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('location: forgotpassword?err_bsf=d47866657f4123b53ee1830172d398559c8fb733d27762da19d7ca36fc13e645'); // Invalid Email detected
            exit();
        };

        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "forgotpassword/creat-new-password?selector=" . $selector . "&validator=". bin2hex($token);

        $expires = date("U") + 1800;

        require "../../../database/connector.php";

        $sql = "DELETE FROM passwordreset WHERE pwdReset_Email=?";
        $stmt = mysqli_stmt_init($db);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('location: forgotpassword?err_blm=ab827e3fe17da220a9a652087a35d20adda002aa4df887c5d813b2b1e95228f9'); // Something went wrong.
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
        }

        $sql = "INSERT INTO passwordreset (pwdReset_Email, pwdReset_Selector, pwdReset_Token, pwdReset_Expires) VALUES (?,?,?,?);";
        $stmt = mysqli_stmt_init($db);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('location: forgotpassword?err_blm=ab827e3fe17da220a9a652087a35d20adda002aa4df887c5d813b2b1e95228f9'); // Something went wrong.
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $token, $expires);
            mysqli_stmt_execute($stmt);
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($db);

        // Email

        $sendTO = $userEmail;
        $subject = "";
        $message = "";
        
        $headers = "From: LowaStatsUnivercity <lowastatsuni@gmail.com>";
        $headers .= "Reply-To: lowastatsuni@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($to, $subject, $message, $headers);

        header('location: forgotpassword?action=5dcaac2c2f626716aa1ed70bd364637e8646f6dd73312371ca0704ea9109746d&ufg=done'); // Email sent successful

    }

}
else{
    header('location: home?err_bgf=ab827e3fe17da220a9a652087a35d20adda002aa4df887c5d813b2b1e95228f9');
}