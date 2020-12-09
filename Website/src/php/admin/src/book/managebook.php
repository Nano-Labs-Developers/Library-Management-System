<?php
$bookname = $bookauthor = $bookimage = $booksdetails = $bookldetails = "";
$booknameERR = $bookauthornameERR = $selectbookcoverERR = $selectbookERR = $bookshortdetailsERR = $booklongdetails = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["bookname"])) {
        $booknameERR=" border border-danger";
    }
    else{
        $bookname=test_input($_POST["bookname"]);
    }

    if (empty($_POST["bookauthorname"])) {
        $bookauthornameERR=" border border-danger";
    }
    else{
        $bookauthorname=test_input($_POST["bookauthorname"]);
    }

    if (empty($_POST["selectbookcover"])) {
        $selectbookcoverERR=" border border-danger";
    }
    else{
        $selectbookcover=test_input($_POST["selectbookcover"]);
    }

    if (empty($_POST["selectbook"])) {
        $selectbookERR=" border border-danger";
    }
    else{
        $selectbook=test_input($_POST["selectbook"]);
    }

    if (empty($_POST["bookshortdetails"])) {
        $bookshortdetailsERR=" border border-danger";
    }
    else{
        $bookshortdetails=test_input($_POST["bookshortdetails"]);
    }
    
    if (empty($_POST["booklongdetails"])) {
        $booklongdetailsERR=" border border-danger";
    }
    else{
        $booklongdetails=test_input($_POST["booklongdetails"]);
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>


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
    <div id="wrapper" style="user-select: none;">
        <?php include '../include/sidebar.php' ?>

        <div class="container mt-n10  my-auto">
            <div class="row">
                <div class="col-lg-12">
                    <div id="addabook">
                        <div class="card mb-4">
                            <div class="card-header">Add a New Book</div>
                            <div class="card-body">
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                            <div class="form-group">
                                                <label for="bookname">Book Name</label>
                                                <input class="form-control <?php echo $booknameERR; ?>" name="bookname" id="bookname" type="text" placeholder="Book Name Here..." value="<?php echo $bookname;?>" maxlength="150" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="bookauthorname">Author Name</label>
                                                <input class="form-control <?php echo $bookauthornameERR; ?>" name="bookauthorname" id="bookauthorname" type="text" placeholder="Book Author Name Here..." value="<?php echo $bookauthor;?>" maxlength="100" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="selectbookcover">Book Cover</label>
                                                <input class="form-control p-1 <?php echo $selectbookcoverERR; ?>" name="selectbookcover" id="selectbookcover" type="text" placeholder="Book Cover image URL..." value="<?php echo $bookimage;?>" maxlength="3000" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="selectbook">Available book count</label>
                                                <select class="form-control <?php echo $selectbookERR; ?>" name="selectbook" id="selectbook" required>
                                                    <option id="1">1</option>
                                                    <option id="2">2</option>
                                                    <option id="3">3</option>
                                                    <option id="4">4</option>
                                                    <option id="5">5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="bookshortdetails">Short Details for the book</label>
                                                <textarea class="form-control <?php echo $bookshortdetailsERR; ?>" name="bookshortdetails" id="bookshortdetails" rows="2" value="<?php echo $booksdetails;?>" maxlength="50" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="booklongdetails">Long Details for the book</label>
                                                <textarea class="form-control <?php echo $booklongdetailsERR; ?>" name="booklongdetails" id="booklongdetails" rows="7" value="<?php echo $bookldetails;?>" maxlength="5000" required></textarea>
                                            </div>
                                            <div class="float-left">
                                                <button type="submit" name="book" id="book" class="btn btn-success btn-circle"><i class="fas fa-check"></i></button>
                                                <button type="reset" name="book" id="book" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../include/footer.inc.php' ?>
    </div>

    <?php include '../include/js.php' ?>
</body>

</html>
