<?php
	$page='pages';
    include '../../../database/connector.php';

    if (!isset($_SESSION['Auth'])){
        header('Location: /login');
    }
    elseif(isset($_SESSION['Auth'])){
        $user_auth=$_SESSION["Auth"];

        $sql="SELECT * FROM `user` WHERE user_auth='$user_auth'";
        $res=mysqli_query($db,$sql);
        $row = mysqli_fetch_assoc($res);

        $username=$row['user_username'];
        $email=$row['user_email'];
        $avatarURL=$row['user_avatarURL'];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
		include '../../../../config/csslinker.php';
	?>
    <title>Account</title>
</head>
<body style="background-color: #4a4c52;">
    <?php 
        include '../../include/navbar/navbar.inc.php';     
    ?>

    <div class="text-center bg-dark pb-1">
        <?php if(isset($_SESSION['UserName'])){ ?>
            <img class="mt-5 rounded-circle border border-success" style="width: 250px; height: 250px;user-select: none;" src="https://cdn.discordapp.com/avatars/556473996539985925/aed3a4c6eefb913c8bedb048e2e8ac2d.png?size=2048" alt="User Avatar">
            <p class="text-white mt-4 font-weight-bold" style="font-size: 35px;">
                <?php echo $username ?><txt2 class="text-white" style="font-size: 20px;">#0707</txt2><br>
                <div style="user-select: none;">
                    <img src="https://cdn.discordapp.com/emojis/767452780105302017.png?v=512" data-toggle="tooltip" data-placement="top" title="Library Staff" style="width: 25px; height: 25px; cursor: pointer;" alt="" draggable="false" aria-label="Library Staff">
                    &nbsp;<img src="https://cdn.discordapp.com/emojis/767452767014354954.png?v=512" data-toggle="tooltip" data-placement="top" title="Library Verified" style="width: 25px; height: 25px; cursor: pointer;" alt="" draggable="false" aria-label="Library Verified">
                    &nbsp;<img src="https://cdn.discordapp.com/emojis/767452745308831785.png?v=512" data-toggle="tooltip" data-placement="top" title="Library Developer" style="width: 25px; height: 25px; cursor: pointer;" alt="" draggable="false" aria-label="Library Developer">
                </div>
            </p>
            
        <?php } ?>
    </div>

    <div class="container mt-5 mb-5" style="user-select: none;">
        <p class="font-weight-bold text-white" style="font-size: 35px;">MY ACCOUNT</p>
        <form action="" method="post" class="card p-3 rounded" style="background-color: #2F3136;">
            <div class="pl-3 mb-3">
                <div class="mb-4">
                    <?php if(isset($_SESSION['UserName'])){ ?>
                        <img class="mt-2 rounded-circle mt-4" style="width: 100px; height: 100px;user-select: none;" src="https://cdn.discordapp.com/avatars/556473996539985925/aed3a4c6eefb913c8bedb048e2e8ac2d.png?size=2048" alt="User Avatar">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<txt class="text-white font-weight-bold mt-4" style="font-size: 35px;"><?php echo $username ?></txt><txt2 class="text-white" style="font-size: 20px;">#0707</txt2>
                        
                        &nbsp;<img src="https://cdn.discordapp.com/emojis/767452780105302017.png?v=512" data-toggle="tooltip" data-placement="top" title="Library Staff" style="width: 20px; height: 20px; cursor: pointer;" alt="">
                        &nbsp;<img src="https://cdn.discordapp.com/emojis/767452767014354954.png?v=512" data-toggle="tooltip" data-placement="top" title="Library Verified" style="width: 20px; height: 20px; cursor: pointer;" alt="">
                        &nbsp;<img src="https://cdn.discordapp.com/emojis/767452745308831785.png?v=512" data-toggle="tooltip" data-placement="top" title="Library Developer" style="width: 20px; height: 20px; cursor: pointer;" alt="">
                    <?php } ?>
                </div>
                <div style="color: #8B8E93" class="ml-3">
                    Name<br><input type="text" value="Pasan Kalhara<?php //echo $_SESSION["Name"] ?>" name="accname" id="accname" class="m-1 text-white rounded bg-transparent" style="outline: none;" placeholder="Name"><br>
                    Email<br><input type="email" value="<?php echo $email ?>" name="accemail" id="accemail" class="m-1 text-white rounded bg-transparent" style="outline: none;" placeholder="Email"><br>
                    Password<br><input type="password" value="password" name="accpass" id="accpass" class="m-1 text-white rounded bg-transparent" style="outline: none;" placeholder=""><br>
                </div>
                <div class="mt-4 float-right">
                    <button type="reset" class="btn btn-warning btn-flat rounded btn-md font-weight-bold" style="color: #000;">Reset</button>
                    <button type="submit" class="btn btn-success rounded btn-md font-weight-bold">Save Changes</button>
                </div>
            </div>
        </form>
    </div>

</body>
    <?php include '../../../../config/jslinker.php'; ?>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</html>