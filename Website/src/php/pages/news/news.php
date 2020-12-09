<?php
    $page='pages';
    require '../../../database/connector.php';
    require '../pagesfunction/function.inc.php';
    require '../../../../config/confignavbar.php';
	include '../../include/navbar/navbar.inc.php';
    include '../../../../config/csslinker.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    
</head>
<body>
    <header class="mb-lg-5">

    </header>

    <section>
    
        <div class="container no-margin">
            <div class="row">
                <div class=" col-md-8" style="margin-top: 25px;">
                    <div class=" text-center">
                        <img class="img-fluid" src="https://preview.colorlib.com/theme/magazine/img/xtop-post1.jpg.pagespeed.ic.XmU0JehXSp.webp" style="height: 450px;width: auto;" alt="" srcset="">
                    </div>

                    <div class="card-title rgba-black-strong text-white mt-3">
                        <h4 class="p-2 pl-3 font-weight-normal">Latest News</h4>
                    </div>
                    
                    <div class="news-body">
                        <?php NewsRow($db); ?>
                    </div>
                    <br><br><br><br><br><br>
                </div>
                <aside class="col-md-4" style="margin-top: 25px;">
                    <p class="font-weight-bold" style="font-size: 20px;">News List</p><hr>
                    <img class="img-fluid mt-3" src="https://media.wired.com/photos/5be4cd03db23f3775e466767/125:94/w_2375,h_1786,c_limit/books-521812297.jpg" alt="" srcset="">
                    <img class="img-fluid mt-3" src="https://image.freepik.com/free-vector/online-library-isometric-design_98292-34.jpg" alt="" srcset="">
                </aside>
            </div>        
        </div>
    
    </section>


    <?php include '../../../../config/jslinker.php'; ?>
</body>
</html>