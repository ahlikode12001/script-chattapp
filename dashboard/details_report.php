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

   //Get data id
   $id_report = mysqli_real_escape_string($conn, $_GET['id_report']);

   //displays all tbl_account data
   $sql = mysqli_query($conn, "SELECT * FROM tbl_report WHERE id_report ='$id_report'");
   if(mysqli_num_rows($sql) > 0){
     $row = mysqli_fetch_assoc($sql);
   }else{
     header("location: report-users.html?type=error");
   }
?>

<?php  include_once 'layout/header.php';?>

<?php  include_once 'layout/sidebar.php';?>

<!--Content Start-->
<div class="content transition">
		<div class="container-fluid dashboard">
			<h3 class="container">Details Report</h3>
		
            <div class="details-report">
                <p class="col-md-8 text-">Admin berhak untuk memberhentikan/membanned/memberi pelanggaran terhadap para pengguna aplikasi ini,
                jika mereka melanggar kebijakan privasi kami dan sebagainya</p>
                <p class="col-md-8 text-">Jika melanggar, silahkan untuk memberi tindakan ke halaman <a href="users-join.html?action=<?= sha1('join-users'); ?>">Users</a></p>
            </div>

            <form class="mt-5">
                <div class="form-group">
                    <label for="Kategori">Kategori</label>
                    <input type="email" class="form-control" id="Kategori" value="<?= $row['categori'];?>" disabled>
                </div>

                <div class="form-group">
                    <label for="Pesan">Pesan</label>
                    <textarea class="form-control" id="Pesan" rows="3" disabled><?= $row['massage_report'];?>
                    </textarea>
                </div>
                
                <div class="form-group">
                    <label for="Pesan">Bukti foto</label>
                    <img src="files/user_report_img/<?= $row['img'];?>" width="500" height="400">
                </div>
                
                </form>
                
  		    </div>
        </div>		 
    </div>
 
 







<?php  include_once 'layout/footer.php';?>
