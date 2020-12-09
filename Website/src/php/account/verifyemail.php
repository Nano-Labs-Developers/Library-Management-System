<?php
session_start();
if(isset($_SESSION['Name'])){

    header('location: ../../../index.php');
}

?>