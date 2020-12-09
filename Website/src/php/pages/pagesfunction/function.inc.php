<?php

// news tab
function NewsRow($db){

    $sql = "SELECT * FROM `news`";
    $stmt = mysqli_stmt_init($db);
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: home?err_bfg=b1cee23b77a7b3dc524f3f0831399e50b7434b63a463992245d96ec4c961eaf9"); // shar256 = stmt status failed
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)){
            echo '
                <div class="card flex-row flex-wrap mt-3">
                    <div class="card-header border-0">
                        <img src="'.$row["npost_img_url"].'" style="width: 200px; height: 200px;" alt="'.$row["npost_title"].'">
                    </div>
                    <div class="card-block px-2 pt-2 text-wrap">
                        <a href="?news_id='.$row["npost_id"].'"><h5 class="card-title font-weight-normal">'.$row["npost_title"].'</h5></a>
                        <p class="card-text text-wrap">'.$row["npost_short_des"].'</p>
                        <a href="?news_id='.$row["npost_id"].'" class="btn btn-primary btn-sm rounded">Read more...</a>
                    </div>
                </div>
            ';
        }
        
    }
    else{
        echo 'no news';
    }

    mysqli_stmt_close($stmt);
}

// contact form
function contact($db){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['contact-details']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $subject = $_POST['subject'];

            if (empty($name) || empty($email) || empty($message) || empty($subject)){
                header('location: contact?err_bfg=cf5671a160460498c0e270f610badc00261d3e1c14cfdf32a2e9580d4a368c59'); // Empty fields detected
                exit();
            }
            
            $sql = "INSERT INTO `contact`(`contact_author_name`, `contact_author_email`, `contact_author_subject`, `contact_author_message`) VALUES (?,?,?,?);";
            $stmt = mysqli_stmt_init($db);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("location: register?err_bfg=b1cee23b77a7b3dc524f3f0831399e50b7434b63a463992245d96ec4c961eaf9"); // shar256 = stmt status failed
                exit();
            }

            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $message, $subject);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("location: contact?st_jck=5b3d39c73a709577f2f91ee2115d5cf3351cb7fb0fac39a7ffcaeec3f1159d9f&cation=done&lang=en&ghdy=sicjw"); // setup successesded

        }

    }
    else{
        header('location: contact');
        exit();
    }

}