<?php

// REGISTER

function emptyInputSignUp($name, $username, $email, $pass, $contact){
    if(empty($name) || empty($username) || empty($email) || empty($pass) || empty($contact)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUsername($username){
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function passMatch($pass, $pass2){
    if($pass !== $pass2){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function UsernameExist($username, $db){
    $sql = "SELECT * FROM `user` WHERE user_username=?";
    $stmt = mysqli_stmt_init($db);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: register?err_bfg=b1cee23b77a7b3dc524f3f0831399e50b7434b63a463992245d96ec4c961eaf9"); // shar256 = stmt status failed
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultDATA = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultDATA)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);

}

function EmailExist($email, $db){
    $sql = "SELECT * FROM `user` WHERE user_email=?;";
    $stmt = mysqli_stmt_init($db);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: register?err_bfg=b1cee23b77a7b3dc524f3f0831399e50b7434b63a463992245d96ec4c961eaf9"); // shar256 = stmt status failed
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultDATA = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultDATA)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);

}

function CreatUser($name, $username, $email, $pass, $contact, $user_perm, $db){
    $HashPass = password_hash($pass, PASSWORD_DEFAULT); // PHP Hash
    $user_perm = '1ed947999a57d679ad0941dcda4e5d6d921c8531';

    $sql = "INSERT INTO `user`(`user_name`, `user_username`, `user_email`, `user_password`, `user_contact`, `user_permission`) VALUES (?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($db);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: register?err_bfg=b1cee23b77a7b3dc524f3f0831399e50b7434b63a463992245d96ec4c961eaf9"); // shar256 = stmt status failed
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssss", $name, $username, $email, $HashPass, $contact, $user_perm);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: login?err_bfg=5b3d39c73a709577f2f91ee2115d5cf3351cb7fb0fac39a7ffcaeec3f1159d9f"); // setup successesded

}

// LOGIN

function emptyInputSignIn($username, $pass){
    if(empty($username) || empty($pass)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function UpdateAuth($db, $username, $pass){
    $PasswordHash2 = password_hash($pass, PASSWORD_DEFAULT); // PHP Hash
    $HashAuth = password_hash($username, PASSWORD_DEFAULT); // PHP Hash Auth

    $sql = "UPDATE `user` SET user_auth=? WHERE user_username=? && user_password=?;";
    $stmt = mysqli_stmt_init($db);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: login?err_bfg=b1cee23b77a7b3dc524f3f0831399e50b7434b63a463992245d96ec4c961eaf9"); // shar256 = stmt status failed
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "sss", $HashAuth, $username, $PasswordHash2);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

}

function LoginUser($db, $username, $pass){
    $UsernameExist = UsernameExist($username, $db);

    if($UsernameExist == false){
        header("location: login?err_bfg=1fed2ba905f75e75c08ef77777aa79486eb904147e3a04ca494e93eca311dd7f"); // username does not exist
        exit();
    }
    $PasswordHash = $UsernameExist["user_password"]; // PasswordHash = DB give us
    $CheckPass = password_verify($pass, $PasswordHash);

    if($CheckPass === false){
        header("location: login?err_bfg=0f6f5a296925b00f03a4801537bedc5f83cd826d99b81a92e476c3a9b9432266"); // login error detected
        exit();
    }
    else if($CheckPass === true){
        $HashAuth = password_hash($username, PASSWORD_DEFAULT); // PHP Hash Auth

        $sql = "UPDATE `user` SET user_auth=? WHERE user_username=? && user_password=?;";
        $stmt = mysqli_stmt_init($db);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: login?err_bfg=b1cee23b77a7b3dc524f3f0831399e50b7434b63a463992245d96ec4c961eaf9"); // shar256 = stmt status failed
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "sss", $HashAuth, $username, $PasswordHash);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        $_SESSION["UserID"] = $UsernameExist["user_id"];
        $_SESSION["UserName"] = $UsernameExist["user_name"];
        $_SESSION["Auth"] = $HashAuth;

        header("location: home"); // login sucesses the redirect main page
        exit();
    }

}

?>