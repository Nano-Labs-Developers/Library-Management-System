<?php
    $page='pages';
    include '../../../../config/confignavbar.php';
	include '../../../database/connector.php';
	include '../../include/navbar/navbar.inc.php';
    include '../../../../config/csslinker.php';

    if (!isset($_SESSION['Auth'])){
        header('Location: /login');
    }
    elseif (isset($_SESSION['Auth'])){
        $auth_key = $_SESSION['Auth'];
        
        $sql="SELECT * FROM `user` WHERE user_auth='$auth_key';";
        $res=mysqli_query($db, $sql) or die(mysqli_error($db));
        $row=mysqli_fetch_assoc($res);
        $count=mysqli_num_rows($res);

        $username = $row['user_username'];
        $userid = $row['user_id'];

        if($count != 1){
            header('Location: /logout');
        }
        
    };

    if (isset($_GET['action'])) {
        if(!empty($_GET['action'])){
            $userauth = $_SESSION["Auth"];
            
            switch($_GET['action']){
                case "7e5608ab610017afe6c1894fdd4f56848823dcb1d12302bd49751d16a290f774"://remove
                    $cookie_data = stripslashes($_COOKIE['ct_sfe_647']);
                    $cart_data = json_decode($cookie_data, true);

                    foreach($cart_data as $keys => $values){
                        if($cart_data[$keys]['item_id'] == $_GET["bk_id"]){
                            unset($cart_data[$keys]);
                            $item_data = json_encode($cart_data);
                            setcookie("ct_sfe_647", $item_data, time() + (86400 * 30));
                        }
                    }
                    echo '<script>window.history.back();</script>';
                break;

                case "913a4cb91be20332f3559f8070255d7ac3e6228bb423f4441551d3f783e7d4f4"://clear

                    setcookie("ct_sfe_647", "", time() - 3600);

                break;
            }
        }
    }

    if(!empty($_GET['checkout'])){
        
        switch($_GET['checkout']){
            case "8540da5c93317afcb8a7ecf7f30c26ab474f70bfb4873f7cceb1df70aee469bf"://doitnow
                $bookidarr = array();
                $cookie_data = stripslashes($_COOKIE['ct_sfe_647']);
                $cart_data = json_decode($cookie_data, true);
                $total=0;
                foreach($cart_data as $keys => $values){
                    $bookid = $values['item_id'];
                    array_push($bookidarr,$bookid);

                    $sql = "UPDATE `book` SET book_availability=0 WHERE book_id=$bookid;INSERT INTO `issued_books`(`issued_book_no`,`issued_buyer_no`,`issued_stats`) VALUES ($bookid, $userid, 1005)";

                    if (mysqli_multi_query($db,$sql)){
                        do{
                           if ($result=mysqli_store_result($db)){
                              while ($row=mysqli_fetch_row($result)){
                                 printf("%s\n",$row[0]);
                              }
                              mysqli_free_result($db);
                           }
                        }while (mysqli_next_result($db));
                     }
                }
                echo '<script>window.history.back();</script>';

            break;
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cart</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="">
        <style>
            .removecart:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body class="skin-light">
        <div class="container-fluid">
            <div class="row px-5 ">
                <div class="col-md-7 mt-5">
                    <div class="shopping-cart">
                        <h6 class="font-weight-bold mb-4" style="font-size: 22px;">My Cart</h6>

                        <table class="table table-borderless">
                            <tr>
                                <th width="35%" class="font-weight-bold text-sm-center">Item Name</th>
                                <th width="10%" class="font-weight-bold text-sm-center">Quantity</th>
                                <th width="20%" class="font-weight-bold text-sm-center">Price</th>
                                <th width="15%" class="font-weight-bold text-sm-center">Total</th>
                                <th width="5%" class="font-weight-bold text-sm-center">Action</th>
                            </tr>
                            <?php

                                if(isset($_COOKIE["ct_sfe_647"])){
                                    $cookie_data = stripslashes($_COOKIE['ct_sfe_647']);
                                    $cart_data = json_decode($cookie_data, true);
                                    $total=0;
                                    foreach($cart_data as $keys => $values){
                                        $bookid = $values['item_id'];
                                        $sql= "SELECT * FROM `book` WHERE book_id=$bookid";
                                        $res=mysqli_query($db, $sql) or die(mysqli_error($db));
                                        $row=mysqli_fetch_assoc($res);

                                        ?>
                                            <tr id="item_<?php echo $row["book_id"]; ?>" class="cart-item">
                                                <td class="text-wrap text-sm-center font-weight-normal"><?php echo $row["book_name"]; ?></td>
                                                <td class="text-wrap text-sm-center font-weight-normal"><?php echo $values["item_quantity"]; ?></td>
                                                <td class="text-wrap text-sm-center font-weight-normal">$ <?php echo $row["book_price"]; ?></td>
                                                <td class="text-wrap text-sm-center font-weight-normal">$ <?php echo number_format($values["item_quantity"] * $row["book_price"], 2);?></td>
                                                <td>
                                                    <a class="text-danger font-weight-normal removecart" href="?bk_id=<?php echo $values["item_id"]; ?>&action=7e5608ab610017afe6c1894fdd4f56848823dcb1d12302bd49751d16a290f774" onclick="history.back()" type="submit">Remove</a>
                                                </td>
                                            </tr>
                                        <?php
                                        $total = $total + ($values["item_quantity"] * $row["book_price"]);
                                    }
                                    
                                }
                                else{
                                    echo '<tr>
                                            <td colspan="5" align="center">No Item in Cart</td>
                                        </tr>';
                                }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="card fa-credit-card-alt col-md-4 offset-md-1 rounded mt-5 bg-white h-25">
                    <div class="pt-4 m-3">
                        <h6 class="font-weight-bold">PRICE DETAILS</h6>
                        <hr>
                        <div class="row price-details">
                            <div class="col-md-6">
                                <?php
                                    if (isset($_SESSION['Auth'])){
                                        // $count  = count($_SESSION['cart']);
                                        echo "<h6 class='font-weight-normal'>Price (1 items)</h6>";
                                    }else{
                                        echo "<h6 class='font-weight-normal'>Price (0 items)</h6>";
                                    }
                                ?>
                                <hr>
                                <h6 class='font-weight-normal'>Total Amount</h6>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-success font-weight-normal">FREE</h6>
                                <hr>
                                <h6 class="text-success font-weight-normal">FREE</h6>
                            </div>
                            <a class="btn mt-4 btn-black btn-block ml-0 rounded" href="?action=913a4cb91be20332f3559f8070255d7ac3e6228bb423f4441551d3f783e7d4f4&checkout=8540da5c93317afcb8a7ecf7f30c26ab474f70bfb4873f7cceb1df70aee469bf">Checkout</a>
                            <div class="m-0 mt-3 text-center" style="user-select: none;">
                                <i class="fab fa-cc-visa fa-2x" style="cursor: pointer;"></i>
                                <i class="fab fa-cc-mastercard fa-2x" style="cursor: pointer;"></i>
                                <i class="fab fa-cc-paypal fa-2x" style="cursor: pointer;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php  
            include '../../../../config/jslinker.php';
        ?>

    </body>
</html>