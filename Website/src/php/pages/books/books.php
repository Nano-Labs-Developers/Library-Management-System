<!DOCTYPE html>

<?php
    $page='pages';
    include '../../../../config/confignavbar.php';
	include '../../../database/connector.php';
	include '../../include/navbar/navbar.inc.php';
    include '../../../../config/csslinker.php';
    require_once ('component.inc.php');
?>

<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Description" content="Put your description here.">
    <title>Books</title>

    <style>
        .protip{
            visibility: hidden;
        }
        .card:hover .protip{
            visibility: visible;
        }
        .card{
          margin-left: 10px;
          margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container-fluid pt-5 pl-4 ">
        <div class="row">
            <?php
                $count = 0;
                $selectevent="SELECT * FROM book"; // book table connect
                $res=mysqli_query($db, $selectevent);
                $count=mysqli_num_rows($res);
                if($count != 0){
                    while($row = mysqli_fetch_assoc($res))
                    {
                        booklist($row['book_id'], $row['book_name'],$row['book_coverURL'], $row['book_small_details'], $row['book_author_name']);
                        
                    }
                }
                elseif($count == 0){
                    echo 'No books found.';
                }
            ?>
        </div>
    </div>
    
    <?php include '../../include/footer/footer.inc.php'; include '../../../../config/jslinker.php'; ?>
</body>
</html>