<?php
    /* at the top of 'check.php' */
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

        /* choose the appropriate page to redirect users */
        die( header( 'location: /error.php' ) );

    }
?>

<?php

    require_once('config.inc.php');

    if($useBoostrapCDN == true){
        // For all
        echo '
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" integrity="sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g==" crossorigin="anonymous" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
            <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
        ';
        
        
    }
    elseif($useBoostrapCDN == false){
        // Home | 404 Pages Link
        if($page == "home"){
            echo '
                <link rel="stylesheet" href="./src/css/bootstrap.min.css">
                <link rel="stylesheet" href="./src/css/all.css">
                <link rel="stylesheet" href="./src/css/mdb.min.css">
                <link rel="stylesheet" href="./src/css/font-awesome.min.css">
            ';
        }

        // Login | Register Pages Link (src/php/account)
        if($page == "account"){
            echo '
                <link rel="stylesheet" href="../../css/bootstrap.min.css">
                <link rel="stylesheet" href="../../css/all.css">
                <link rel="stylesheet" href="../../css/mdb.min.css">
                <link rel="stylesheet" href="../../css/font-awesome.min.css">
            ';
        }

        // Admin Pages Link (src/php/admin/)
        if($page == "admin"){
            echo '
                <link rel="stylesheet" href="./src/css/bootstrap.min.css">
                <link rel="stylesheet" href="./src/css/all.css">
                <link rel="stylesheet" href="./src/css/mdb.min.css">
                <link rel="stylesheet" href="./src/css/font-awesome.min.css">
            ';
        }

        // Footer Page Link (src/php/include/footer)
        if($page == "footer"){
            echo '
                <link rel="stylesheet" href="./src/css/bootstrap.min.css">
                <link rel="stylesheet" href="./src/css/all.css">
                <link rel="stylesheet" href="./src/css/mdb.min.css">
                <link rel="stylesheet" href="./src/css/font-awesome.min.css">
            ';
        }

        // User Page Link (src/php/pages)
        if($page == "pages"){
            echo '
                <link rel="stylesheet" href="../../../css/bootstrap.min.css">
                <link rel="stylesheet" href="../../../css/all.css">
                <link rel="stylesheet" href="../../../css/mdb.min.css">
                <link rel="stylesheet" href="../../../css/font-awesome.min.css">
            ';
        }
    }

?>