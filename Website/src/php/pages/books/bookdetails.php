<?php
    ob_start();
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Details</title>
        
        <?php
            $page='pages';
            include '../../../database/connector.php';
            include '../../../../config/csslinker.php';
            require_once ('component.inc.php');
        ?>

        <style type="text/css">
            .status.green::before {
                background-color: #21ba45 !important;
            }
            
            .status:before {
                content: "";
                width: 7px;
                height: 7px;
                background-color: #21ba45;
                border-radius: 50%;
                position: absolute;
                left: 0;
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                -ms-border-radius: 50%;
                -o-border-radius: 50%;
            }
            
            .status.green2::before {
                background-color: #21ba45 !important;
            }
            
            .status.red2::before {
                background-color: #dc3545 !important;
            }
            
            .status.gray2::before {
                background-color: #5f6661 !important;
            }
            
            .status.purple2::before {
                background-color: #6f42c1 !important;
            }
            
            :after, :before {
                -webkit-box-sizing: inherit;
                box-sizing: inherit;
            }
            
            .status {
                pointer-events: none;
            }
            
            .status {
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex-direction: row;
                flex-wrap: nowrap;
                
                text-transform: uppercase;
                font: 700 12px "Karla",sans-serif;
                position: relative;
                padding-left: 15px;
                width: 58px;
            }
            
            .status.green2 {
                color: #21ba45 !important;
            }
            
            .status.red2 {
                color: #dc3545 !important;
            }
            
            .status.gray2 {
                color: #5f6661 !important;
            }
            
            .status.purple2 {
                color: #6f42c1 !important;
            }
        </style>

    </head>
    <body style="overflow: auto;">

<?php
    include '../../../../config/confignavbar.php';
    include '../../include/navbar/navbar.inc.php';
    if(isset($_GET['bk_id'])){
        $book_id_link = $_GET['bk_id'];
        $count=0;
        $sql="SELECT * FROM book WHERE book_id = $book_id_link";
        $res=mysqli_query($db, $sql) or die(mysqli_error($db));
        $row=mysqli_fetch_assoc($res);
        $count=mysqli_num_rows($res);
        if($count == 0){
            echo '<script type="text/javascript">location.href = "books";</script>';
        }

?>
        <div class="container">
            <div class="" style="margin-top: 100px;">
                
                <?php

                    bookdetails($row['book_id'], $row['book_name'],$row['book_coverURL'], $row['book_details'], $row['book_availability'], $row['book_author_name']);
            
                    if (isset($_GET['action'])) {
                        if (isset($_SESSION['Auth'])){
                            if(!empty($_GET['action'])){
                                $auth_key = $_SESSION['Auth'];
                                $sql="SELECT * FROM `user` WHERE user_auth='$auth_key';";
                                $res=mysqli_query($db, $sql) or die(mysqli_error($db));
                                $row=mysqli_fetch_assoc($res);
                                $count=mysqli_num_rows($res);
                                
                                $username = $row['user_username'];
                                $userid = $row['user_id'];
                                $book_id_link = $_GET['bk_id'];

                                switch($_GET['action']){
                                    case "7e9e5ac30f2216fd0fd6f5faed316f2d5983361a4203c3330cfa46ef65bb4767"://add
                                                                                
                                        if(isset($_COOKIE['ct_4158'])) {
                                            $cookie_data = stripslashes($_COOKIE['ct_4158']);
                                            $cart_data = json_decode($cookie_data, true);
                                        }
                                        else{
                                            $cart_data = array();
                                        }
    
                                        $item_id_list = array_column($cart_data, 'item_id');
                                        // print_r($item_id_list);

                                        if(in_array($book_id_link, $item_id_list)){
                                            
                                            foreach($cart_data as $keys => $values){
                                                if($cart_data[$keys]["item_id"] == $book_id_link){
                                                    echo '<script type="text/javascript">alert("This book is already added in your cart.")</script>';
                                                    return;
                                                }
                                            }
                                        }
                                        else{
                                            
                                            $item_array = array(
                                                'item_id'   => $book_id_link,
                                                'item_quantity'  => 1
                                            );
                                            $cart_data[] = $item_array;
                                            // print_r($cart_data);
                                        }
                                        $item_data = json_encode($cart_data);
                                        setcookie('ct_sfe_647', $item_data, time() + (86400 * 30));
                                        echo '<script>window.history.back();</script>';
    
                                    break;
    
                                    case "7e5608ab610017afe6c1894fdd4f56848823dcb1d12302bd49751d16a290f774"://remove
                                        $book_id_link = $_GET['bk_id'];
                                        $userid = $_SESSION['User_ID'];
                                        $username = $_SESSION['Username'];
    
                                        $cookie_data = stripslashes($_COOKIE['ct_sfe_647']);
                                        $cart_data = json_decode($cookie_data, true);
    
                                        foreach($cart_data as $keys => $values){
                                            if($cart_data[$keys]['item_id'] == $book_id_link){
                                                unset($cart_data[$keys]);
                                                $item_data = json_encode($cart_data);
                                                setcookie("ct_sfe_647", $item_data, time() + (86400 * 30));
                                            }
                                        }
    
                                    break;
    
                                    case "913a4cb91be20332f3559f8070255d7ac3e6228bb423f4441551d3f783e7d4f4"://clear
    
                                        setcookie("ct_sfe_647", "", time() - 3600);
    
                                    break;
        
                                }
                            }
                            
                        }
                        else{
                            header('Location: /login');
                        }
                    };

                ?>
            </div>
        </div>

<?php
}
else{
    echo '<script type="text/javascript">location.href = "./books";</script>';
}
?>
</body>
    <?php include '../../../../config/jslinker.php'; ?>
</html>