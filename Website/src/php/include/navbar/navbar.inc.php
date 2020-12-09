<style>
    .bg-custom-1 {
        background-color: #85144b;
    }

    .bg-custom-2 {
        background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
    }
</style>

<header style="margin-bottom: 65.4px;" role="heading">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top scrolling-navbar" style="user-select: none; background-color: white;">
        <div class="container-fluid">
            <a class="navbar-brand font-weight-bold title" href="<?php echo $home ?>">Lowa State University</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02" role="navbarlinklist"  aria-owns="navlinklistul">
                <ul class="navbar-nav mr-auto smooth-scroll" role="navlinklistul"  aria-owns="navlink-1 navlink-2 navlink-3 navlink-4 navlink-5 navlink-6">
                    <li class="nav-item">
                        <a class="nav-link title" id="navlink-1" href="home" data-offset="90" role="navlink">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link title" id="navlink-2" href="books" data-offset="90" role="navlink">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link title" id="navlink-3" href="news" data-offset="90" role="navlink">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link title" id="navlink-4" href="blog" data-offset="90" role="navlink">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link title" id="navlink-5" href="about" data-offset="90" role="navlink">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link title" id="navlink-6" href="contact" data-offset="90" role="navlink">Contact</a>
                    </li>
                    
                </ul>
                <?php
                    if(isset($_SESSION['Auth'])){
                        $countnav=0;
                        $auth_key=$_SESSION['Auth'];
                        $sqlnav="SELECT * FROM `user` WHERE user_auth='$auth_key';";
                        $resnav=mysqli_query($db, $sqlnav) or die(mysqli_error($db));
                        $rownav=mysqli_fetch_assoc($resnav);
                        $countnav=mysqli_num_rows($resnav);

                        $user_perms=$rownav['user_permission'];

                        if($countnav == 1){
                            echo '<a href="cart" class="nav-link nav-item"><i class="fas fa-shopping-cart mr-3" style="cursor: pointer;"></i></a>';
                        }

                    }
                ?>
                <ul class="navbar-nav">
                    <div class="login-container">
                        <?php
                        
                            if(isset($_SESSION['Auth'])){
                                if($countnav == 1){
                                    if($user_perms != '5ae467327ec3ef616e3e628f265edfea63df9ff9' && $user_perms != 'beb8ba87c3e3eb39c6af2f8d9b91251adfa0b17c'){
                                        // echo '<li class="nav-item"><img src="../../../../image/img_avatar2.png" alt="'.$_SESSION['Name'].'" class="align-middle rounded-circle" style="height: 35px; width: 35px; cursor: pointer;"></li>';
                                        echo '<li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                    '.$_SESSION["UserName"].'
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="Preview">
                                                    <a class="dropdown-item" href="dashboard">Dashboard</a>
                                                    <a class="dropdown-item" href="account">Account</a>
                                                    <a class="dropdown-item" href="logout">Log Out</a>
                                                </div>
                                            </li>';
                                    }
                                    elseif($user_perms == '5ae467327ec3ef616e3e628f265edfea63df9ff9' && $user_perms == '5ae467327ec3ef616e3e628f265edfea63df9ff9'){
                                        echo '<li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                    '.$_SESSION["UserName"].'
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="Preview">
                                                    <a class="dropdown-item" href="dashboard">Dashboard</a>
                                                    <a class="dropdown-item" href="management/dashboard">Management</a>
                                                    <a class="dropdown-item" href="account">Account</a>
                                                    <a class="dropdown-item" href="logout">Log Out</a>
                                                </div>
                                            </li>';
                                    }

                                }
                                
                            }
                            else{
                                echo '
                                    <a href="login"><button type="submit" class="btn-samll btn-default rounded login-index" style="cursor: pointer;">Login</button></a>
                                    <a href="register"><button type="" class="btn-samll btn-default rounded login-index" style="cursor: pointer;">Register</button></a>
                                ';
                            }
                        
                        ?>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
</header>