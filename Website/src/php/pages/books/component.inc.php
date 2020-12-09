<?php

// Books.php
function booklist($bookid, $bookname, $book_coverURL, $book_details, $book_author_name){
    
    $element = "
        <div class=\"card ml-2 mt-2\" style=\"width: 18rem; user-select: none;\">
            <a href=\"./bookdetails?bk_id=$bookid\">
                <img class=\"card-img-top\" style=\"height: 258px; width: 286px;\" src=\"$book_coverURL\" alt=\"resources\">
            </a>
            <div class=\"card-body\">
                <p class=\"card-text\"><b><a href=\"./bookdetails?bk_id=$bookid\">$bookname</a></b><br>Author: $book_author_name<br>$book_details<br>
                <small class=\"protip\"><tip1 style=\"color: lightgreen;\" class=\"font-weight-bold align-bottom\">PRO TIP</tip1>: Click for get more details.</small></p>
            </div>
        </div>
    ";

    echo $element;

}

// Bookdetails.php
function bookdetails($bookid, $bookname, $book_coverURL, $book_details, $book_availability, $book_author_name){
    if($book_availability == 0){
        $classcolor = " red2";
        $tags="";
        $statsmsg = "NOT&nbsp;AVAILABLE";
        $addcartaction = " disabled";
        $submit = "";
        $linktoaddcart = "";
        $linktoaddcart2 = "";
    }
    elseif($book_availability == 1){
        $classcolor = " green2";
        $tags=" name='cart' id='cart' type='submit'";
        $statsmsg = "AVAILABLE";
        $addcartaction = "";
        $submit = "";
        $linktoaddcart = "<a href=\"./checkout?action=add&id=$bookid\">";
        $linktoaddcart2 = "</a>";
    }
    elseif($book_availability == 2){
        $classcolor = " gray2";
        $tags="";
        $statsmsg = "BOOKED";
        $addcartaction = " disabled";
        $submit = "";
        $linktoaddcart = "";
        $linktoaddcart2 = "";
    }
    elseif($book_availability == 3){
        $classcolor = " purple2";
        $tags="";
        $statsmsg = "COMING&nbsp;SOON";
        $addcartaction = " disabled";
        $submit = "";
        $linktoaddcart = "";
        $linktoaddcart2 = "";
    }

    $element = "
        
        <img src=\"$book_coverURL\" class=\"rounded float-left img-thumbnail mt-5\" alt=\"Book Cover Image\" width=\"320px\">
        <div class=\"col-lg-8 ml-auto col-md-12 col-sm-12\">
            <div class=\"font-weight-bold display-4 title text-center\">$bookname</div>
            <div class=\"mt-5 pl-3\">
                <span class=\"status$classcolor\">$statsmsg</span>
            </div>
            <form methord=\"POST\" style=\"user-select: none;\">
                <a class=\"btn btn-green mt-4 rounded$addcartaction\"$submit $tags href=\"?bk_id=$bookid&action=7e9e5ac30f2216fd0fd6f5faed316f2d5983361a4203c3330cfa46ef65bb4767\">ADD CART</a>
                <a class=\"btn btn-red mt-4 rounded\" href=\"\">REPORT</a>
            </form>
            <textarea readonly class=\" p-3 mt-3 overflow-auto text-wrap\" style=\"outline: none;resize: none;\" spellcheck=\"false\" name=\"\" id=\"\" cols=\"90\" rows=\"13\">$book_details</textarea>
        </div>
    ";

    echo $element;
}

?>