<?php 
  //session and prevent users direct access
  session_start();
  include_once "api/config.php";
  if(!isset($_SESSION['id_config'])){
    header("location: login.html");
  }

  //session data id
  $unique_id = htmlentities($_SESSION['id_config']);

  //displays all tbl_configration data
  $sql = mysqli_query($conn, "SELECT * FROM tbl_configration WHERE id_config = '$unique_id'");
    if(mysqli_num_rows($sql) > 0){
      $config = mysqli_fetch_assoc($sql);
  }

  //call up the supported account data
  $ban = mysqli_query($conn, "SELECT * FROM tbl_account WHERE ban_account  = 'aktif'");
  $result_ban = mysqli_num_rows($ban);
  //call the reported account data
  $report = mysqli_query($conn, "SELECT * FROM tbl_report");
  $result_report = mysqli_num_rows($report);
  //call all account data
  $allaccount = mysqli_query($conn, "SELECT * FROM tbl_account");
  $result_account = mysqli_num_rows($allaccount);
  //call all account admin data
  $alladmin = mysqli_query($conn, "SELECT * FROM tbl_configration");
  $result_admin = mysqli_num_rows($alladmin);
?>

<?php  include_once 'layout/header.php';?>

<?php  include_once 'layout/sidebar.php';?>


	<!--Content Start-->
	<div class="content transition">
		<div class="container-fluid dashboard">
			<h3>Dashboard</h3>
		
			<div class="row">

				<div class="col-md-6 col-lg-3">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-4 d-flex align-items-center">
									<i class="las la-ban icon-home bg-danger text-light"></i>
								</div>
								<div class="col-8">
									<p>Banned Users</p>
									<h5><?= htmlentities($result_ban) ?></h5>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-3">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-4 d-flex align-items-center">
									<i class="las la-flag icon-home bg-warning text-light"></i>
								</div>
								<div class="col-8">
									<p>Laporan Users</p>
									<h5><?= htmlentities($result_report) ?></h5>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-3">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-4 d-flex align-items-center">
									<i class="las la-users  icon-home bg-info text-light"></i>
								</div>
								<div class="col-8">
									<p>Total Users</p>
									<h5><?= htmlentities($result_account) ?></h5>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-3">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-4 d-flex align-items-center">
									<i class="las la-users-cog  icon-home bg-warning text-light"></i>
								</div>
								<div class="col-8">
									<p>Total Admins</p>
									<h5><?= htmlentities($result_admin) ?></h5>
								</div>
							</div>
						</div>
					</div>

				</div>
		
		


<?php  include_once 'layout/footer.php';?>

 