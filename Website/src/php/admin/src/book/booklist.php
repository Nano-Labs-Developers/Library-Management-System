<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manage Books</title>
    <?php include '../include/css.php' ?>
</head>

<body id="page-top">
    <div id="wrapper">

        <?php include '../include/sidebar.php' ?>

        <div class="container-fluid mt-n10 my-auto" style="overflow: auto;">
            <div class="row">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Book ID</th>
                            <th>Book Name</th>
                            <th>Author</th>
                            <th>Stats</th>
                            <th>Browed User</th>
                            <th>Browed Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once('../component.php');
                            $count = 0;
                            $sql="SELECT * FROM `book`"; // book table connect
                            $res=mysqli_query($db, $sql);
                            $count=mysqli_num_rows($res);
                            
                            if($count != 0){
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    $count2 = 0;
                                    $bookid = $row['book_id'];
                                    $sql2="SELECT * FROM `issued_books` WHERE issued_book_no=`$bookid`";
                                    $res2=mysqli_query($db, $sql2);
                                    $row2 = mysqli_fetch_assoc($res);
                                    if(empty($row2)){
                                        $count2=mysqli_num_rows($res2);
                                    }
                                    
                                    if(empty($row2['issued_buyer_no'])){
                                        $issued_buyer_no = '-';
                                    }
                                    else{
                                        $issued_buyer_no = $row2['issued_buyer_no'];
                                    };

                                    if(empty($row2['issued_borrowed_timestamp'])){
                                        $issued_borrowed_timestamp = '-';
                                    }
                                    else{
                                        $issued_borrowed_timestamp = $row2['issued_borrowed_timestamp'];
                                    };

                                    if($count2 == 0){
                                        $action = '<button type="submit" name="deletebook" id="deletebook" class="btn btn-danger">DELETE</button>';
                                    }
                                    else{
                                        $action = '<button type="submit" name="returnbook" id="returnbook" class="btn btn-light-blue">RETURN</button>';
                                    };

                                    $book_availability = $row['book_availability'];
                                    if($book_availability == 1){
                                        $book_availability = "Available";
                                    }
                                    elseif($book_availability == 1){
                                        $book_availability = "Not Available";
                                    }

                                    booklistadmin($bookid, $row['book_name'], $row['book_author_name'], $book_availability, $issued_buyer_no, $issued_borrowed_timestamp, $action);
                                    
                                }

                            }
                            elseif($count == 0){
                                echo 'No books found.';
                            }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include '../include/js.php' ?>
</body>

</html>