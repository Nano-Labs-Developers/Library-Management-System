<!-- Config file 2020 -->

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

    $websitename = "Lowa State University";

    // Home | 404 Pages Link
    if($page == "home"){
        $home="home";
        $book="books";
        $login="login";
        $register="register";
        $dashboard="dashboard";
        $account="account";
        $logout="logout";
    }

    // Login | Register Pages Link (src/php/account)
    if($page == "account"){
        $home="home";
        $book="books";
        $login="login";
        $register="register";
        $dashboard="dashboard";
        $account="account";
        $logout="logout";
    }

    // Admin Pages Link (src/php/admin/)
    if($page == "admin"){
        $home="../../../index";
        $book="books";
        $dashboard="dashboard";
        $account="account";
        $logout="logout";
    }

    // Footer Page Link (src/php/include/footer)
    if($page == "footer"){
        $home="home";
        $login="login";
        $register="register";
        $dashboard="dashboard";
        $account="account";
        $logout="logout";
    }

    // User Page Link (src/php/pages)
    if($page == "pages"){
        $home="home";
        $book="books";
        $login="login";
        $register="register";
        $dashboard="dashboard";
        $account="account";
        $logout="logout";
    }

?>