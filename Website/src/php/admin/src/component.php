<?php

// Books.php
function booklistadmin($bookid, $bookname, $bookauthor, $bookavailability, $issuedbuyerno, $issuedborrowedtimestamp, $action){
    $element = "
        <tr>
            <td>$bookid</td>
            <td>$bookname</td>
            <td>$bookauthor</td>
            <td>$bookavailability</td>
            <td>$issuedbuyerno</td>
            <td>$issuedborrowedtimestamp</td>
            <td>$action</td>
        </tr>
    ";

    echo $element;

}


?>

