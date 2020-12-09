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

    require_once('config.inc.php');

    if($useBoostrapCDN == true){
        echo '
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
        ';
    }
    elseif($useBoostrapCDN == false){
        // Home | 404 Pages Link
        if($page == "home"){
            echo '
                <script src="./src/js/bootstrap.min.js"></script>
                <script src="./src/js/jquery.min.js"></script>
                <script src="./src/js/mdb.min.js"></script>
            ';
        }

        // Login | Register Pages Link (src/php/account)
        if($page == "account"){
            echo '
                <script src="../../js/bootstrap.min.js"></script>
                <script src="../../js/jquery.min.js"></script>
                <script src="../../js/mdb.min.js"></script>
            ';
        }

        // Admin Pages Link (src/php/admin/)
        if($page == "admin"){
            echo '
                <script src="../../js/bootstrap.min.js"></script>
                <script src="../../js/jquery.min.js"></script>
                <script src="../../js/mdb.min.js"></script>
            ';
        }

        // Footer Page Link (src/php/include/footer)
        if($page == "footer"){
            echo '
                <script src="./src/js/bootstrap.min.js"></script>
                <script src="./src/js/jquery.min.js"></script>
                <script src="./src/js/mdb.min.js"></script>
            ';
        }

        // User Page Link (src/php/pages)
        if($page == "pages"){
            echo '
                <script src="../../../js/bootstrap.min.js"></script>
                <script src="../../../js/jquery.min.js"></script>
                <script src="../../../js/mdb.min.js"></script>
            ';
        }
    }

?>