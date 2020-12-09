<!-- <script>
function goBack() {
window.history.back();
}
</script> -->

<?php
    session_start();
    $cookie = $_COOKIE['shopping_cart'];
    $cookie = stripslashes($cookie);


?>