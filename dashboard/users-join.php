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


require 'api/functions.php';

// pagination
// konfigurasi
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM tbl_account"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$account_users = query("SELECT * FROM tbl_account LIMIT $awalData, $jumlahDataPerHalaman");

 
?>

<?php  include_once 'layout/header.php';?>

<?php  include_once 'layout/sidebar.php';?>

<!--Content Start-->
<div class="content transition">
		<div class="container-fluid dashboard">
			<h3 class="container">Users</h3>
		
			<div class="row">
		

  			<div class="container"> 
			  <div class="table-responsive">
  				<table class="table table-striped">
				<thead class="table-dark text-white">
					<tr>
					<th scope="col">#</th>
					<th scope="col">Nama Depan</th>
					<th scope="col">Nama Belakang</th>
					<th scope="col">Email</th>
					<th scope="col">Status banned</th>
                    <th scope="col">Bergabung Pada</th>
                    <th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>

				<?php $i = 1; ?>
				<?php foreach( $account_users as $row ) : ?>
					<tr>
					<th scope="row"><?= $i; ?></th>
					<td><?= htmlentities($row["fname"]); ?></td>
					<td><?= htmlentities($row["lname"]); ?></td>
					<td><?= htmlentities($row["email"]); ?></td>
                    <td><?= htmlentities($row["status"]); ?></td>
					<td><?= htmlentities($row["join_date"]); ?></td>
					<td><a href="delete-user/<?= htmlentities($row['user_id']);?>">Hapus</a> || 
					<a href="details_user.php?user_id=<?= htmlentities($row['user_id']);?>">Edit</a></td>
					</tr>
				<?php $i++; ?>
				<?php endforeach; ?>
				 

 
				
				</tbody>
				</table>
			</div>
			<div>

			<nav aria-label="Page navigation example mt-5">
			<ul class="pagination justify-content-end">
			 <li class="page-item"><a class="page-link" href="?halaman=1">Awal</a> </li>
			<?php if( $halamanAktif > 1 ) : ?>
				<li class="page-item"><a class="page-link" href="?halaman=1?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a> </li>
			<?php endif; ?>

			<?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
				<?php if( $i == $halamanAktif ) : ?>
					<li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
				<?php else : ?>
					<li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a> </li>
				<?php endif; ?>
			<?php endfor; ?>

			<?php if( $halamanAktif < $jumlahHalaman ) : ?>
				<li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a> </li>
			<?php endif; ?>
			<li class="page-item"><a class="page-link" href="?halaman=<?= $jumlahHalaman; ?>">Akhir</a> </li>
			</ul>
		</nav>

		</div>
		</div>







<?php  include_once 'layout/footer.php';?>
