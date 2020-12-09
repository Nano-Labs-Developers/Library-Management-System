<?php
	$page='pages';
	include '../../../database/connector.php';

	// User Count
	$sqluser="SELECT * FROM `user`;";
	$countuser=0;
    $resuser=mysqli_query($db,$sqluser);
	$countuser=mysqli_num_rows($resuser);
	
	// Book Count
	$sqlbook="SELECT * FROM `book`;";
	$countbook=0;
    $resbook=mysqli_query($db,$sqlbook);
	$countbook=mysqli_num_rows($resbook);

	// // Book Count
	// $sqlorder="SELECT * FROM `order`;";
	// $countorder=0;
    // $resorder=mysqli_query($db,$sqlorder);
	// $countorder=mysqli_num_rows($resorder);

?>


<!DOCTYPE html>
<html>
<head>
	<?php
		include '../../../../config/csslinker.php';
	?>
	<title>Dashboard</title>
</head>
<body>
	<?php
		include '../../include/navbar/navbar.inc.php';
		
		if (!isset($_SESSION["Auth"])){
			header('Location: /login');
		};
		
		?>

	<div class="container-fluid" style="margin-top: 100px;">
		<div class="row">
          <div class="col-lg-3 col-6" style="margin-bottom: 10px;">
            <!-- small box -->
            <div class="small-box bg-info p-3 rounded">
              <div class="inner text-white">
                <h3 class="font-weight-bold">150</h3>

                <p class="font-weight-normal">New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
			  </div>
			  <div style="text-align: center;">
              	<a href="#" class="small-box-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
			  </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success p-3 rounded">
              <div class="inner text-white">
                <h3 class="font-weight-bold"><?php echo $countbook ?></h3>

                <p class="font-weight-normal">Available Books</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
			  </div>
			  <div style="text-align: center;">
              	<a href="#" class="small-box-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
			  </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning p-3 rounded">
              <div class="inner text-black">
                <h3 class="font-weight-bold"><?php echo $countuser ?></h3>

                <p class="font-weight-normal">User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
			  </div>
			  <div style="text-align: center;">
              	<a href="#" class="small-box-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
			  </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger p-3 rounded">
              <div class="inner text-white">
                <h3 class="font-weight-bold"><?php echo $countbook ?></h3>

                <p class="font-weight-normal">Available Books</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
			  </div>
			  <div style="text-align: center;" >
              	<a href="#" class="small-box-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
			  </div>
            </div>
          </div>
          <!-- ./col -->
		</div>
		
		<div class=" mt-2 ml-0">
			<div class="card">
              	<div class="card-header border-transparent">
                	<h3 class="card-title">Latest Orders</h3>

                	<div class="card-tools">
                  		<button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#collapsecard1" aria-expanded="false" aria-controls="collapsecard1">
                    		Show/Hide
                  		</button>
                	</div>
              	</div>
              	<!-- /.card-header -->
              	<div class="card-body p-0 collapse.show" id="collapsecard1">
					<div class="table-responsive">
						<table class="table m-0 text-center">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Item</th>
									<th>Status</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
							<tr>
                      			<td><a href="pages/examples/invoice.html">ORB100</a></td>
                      			<td>Sharlock Homes</td>
                      			<td><span class="badge badge-warning">Pending</span></td>
                      			<td>
                        			<div class="sparkbar" data-color="#f39c12" data-height="20">2020/10/22 10:48:55</div>
                      			</td>
							</tr>
							<tr>
                      			<td><a href="pages/examples/invoice.html">ORB100</a></td>
                      			<td>Sharlock Homes</td>
                      			<td><span class="badge badge-danger">Delivered</span></td>
                      			<td>
                        			<div class="sparkbar" data-color="#f39c12" data-height="20">2020/10/22 10:48:55</div>
                      			</td>
							</tr>
							<tr>
                      			<td><a href="pages/examples/invoice.html">ORB100</a></td>
                      			<td>Sharlock Homes</td>
                      			<td><span class="badge badge-success">Shipped</span></td>
                      			<td>
                        			<div class="sparkbar" data-color="#f39c12" data-height="20">2020/10/22 10:48:55</div>
                      			</td>
							</tr>
							<tr>
                      			<td><a href="pages/examples/invoice.html">ORB100</a></td>
                      			<td>Sharlock Homes</td>
                      			<td><span class="badge badge-info">Processing</span></td>
                      			<td>
                        			<div class="sparkbar" data-color="#f39c12" data-height="20">2020/10/22 10:48:55</div>
                      			</td>
                    		</tr>
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
              	</div>
              	<!-- /.card-body -->
              	<div class="card-footer clearfix">
                	<a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                	<a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              	</div>
              	<!-- /.card-footer -->
            </div>
		</div>
	</div>

</body>
	<?php include '../../../../config/jslinker.php'; ?>
</html>