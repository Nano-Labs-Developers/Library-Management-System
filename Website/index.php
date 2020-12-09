<!DOCTYPE html>
<?php
	$page='home';
	include "./src/database/connector.php";
	include './config/csslinker.php';
	include './config/confignavbar.php';
	include './config/configfooter.inc.php';
	include './src/php/include/navbar/navbar.inc.php';
?>

<html lang="en">
<head>
	<title>Lowa State University</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Description" content="Lowa stats univercity library management system">
	<meta name="keywords" content="Lowa stats univercity, library, books">
	<link rel="home" href="http://lowastatsuni.tk/">
	<meta name="robots" content="all">

	<link rel="stylesheet" href="./src/css/style.css">
	<link rel="apple-touch-icon" href="./src/images/logo.png">

</head>

<body>
	<header>
		<div class="section" id="carousel" style="background-color: black;"">
			<div class="container-fluid pb-4">
				<div class="row">
					<div class="col-md-8 mr-auto ml-auto mt-4">
						<!-- Carousel Card -->
						<div class="card card-raised card-carousel">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
							<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
							</ol>
							<div class="carousel-inner">
							<div class="carousel-item">
								<img class="d-block w-100" src="https://demos.creative-tim.com/material-kit/assets/img/city-profile.jpg" alt="First slide">
								<div class="carousel-caption d-none d-md-block">
								<h4>
									<i class="material-icons">location_on</i>
									Yellowstone National Park, United States
								</h4>
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="https://demos.creative-tim.com/material-kit/assets/img/city-profile.jpg" alt="Second slide">
								<div class="carousel-caption d-none d-md-block">
								<h4>
									<i class="material-icons">location_on</i>
									Somewhere Beyond, United States
								</h4>
								</div>
							</div>
							<div class="carousel-item active">
								<img class="d-block w-100" src="https://demos.creative-tim.com/material-kit/assets/img/city-profile.jpg" alt="Third slide">
								<div class="carousel-caption d-none d-md-block">
								<h4>
									<i class="material-icons">location_on</i>
									Yellowstone National Park, United States
								</h4>
								</div>
							</div>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"></a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"></a>
						</div>
						</div>
						<!-- End Carousel Card -->
					</div>
				</div>
			</div>
		</div>
	</header>

	<main style="height: 100%;">
		<img src="" alt="" srcset="">
	</main>
	<?php include './src/php/include/footer/footer.inc.php'; ?>
</body>

<?php include './config/jslinker.php'; ?>

</html>
