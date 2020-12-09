<?php
    $page='pages';
    require('../pagesfunction/function.inc.php');
    include '../../../../config/confignavbar.php';
	include '../../../database/connector.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['contact-details']))
        {
            contact($db);
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include '../../../../config/csslinker.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <?php include '../../include/navbar/navbar.inc.php'; ?>

    <div class="container">
    <section class="mb-4" ><br>
            <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>

            <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                a matter of hours to help you.</p>
            <div class="row">
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <label for="name" class="">Your name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control">
                                    <label for="email" class="">Your email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label for="subject" class="">Subject</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                    <label for="message">Your message</label>
                                </div>

                            </div>
                        </div>
                        <div class="text-center text-md-left">
                            <button type="submit" name="contact-details" class="btn btn-primary rounded">Send</button>
                        </div>
                    </form>
                    
                    <div class="status"></div>
                </div>
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-map-marker-alt fa-2x"></i>
                            <p>San Francisco, CA 00000, USA</p>
                        </li>

                        <li><i class="fas fa-phone mt-4 fa-2x"></i>
                            <p>+ 00 000 000 00</p>
                        </li>

                        <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                            <p>contact@lowastatsuni.com</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section><br>
    </div>


    <?php include '../../include/footer/footer.inc.php'; include '../../../../config/jslinker.php'; ?>
</body>
</html>