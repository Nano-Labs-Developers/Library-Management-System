<?php

    include '../../database/connector.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Log</title>
</head>
<body style="background-color: black;" class="container-fluid">

    <?php
        // if(isset($_SESSION["User"])){
            $sqlselect="SELECT * FROM `log`";
            $res=mysqli_query($db,$sqlselect);
            $row = mysqli_fetch_assoc($res);
            $count=mysqli_num_rows($res);
            $counter=0;
            
            if(isset($row['log_id'])){
                while($counter > $count){
                    echo '<p style="color: white;overflow-wrap: break-word">';
                    echo '['; echo  $row['log_timestamp']; echo ']'; echo '&nbsp'; echo 'ID: '; echo $row['log_id']; echo '&nbsp'; echo '>>>'; echo '&nbsp'; echo $row['log_name']; echo '&nbsp'; echo '>>>'; echo '&nbsp'; echo $row['log_details']; echo '<br><br>';
                    echo '</p>';
                    $counter=$counter+1;
                }
            }

        // }

    ?>
    
</body>
</html>