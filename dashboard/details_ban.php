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
   $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

   //displays all tbl_account data
   $sql = mysqli_query($conn, "SELECT * FROM tbl_account WHERE user_id ='$user_id'");
   if(mysqli_num_rows($sql) > 0){
     $row = mysqli_fetch_assoc($sql);
   }else{
     header("location: banned-users.html?type=error");
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

            <?php  include_once 'api/update_ban.php';?>
 
            <form class="mt-5" action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?= $row['user_id'];?>" hidden>
                </div>

                <div class="form-group">
                <input type="radio" name="ban_account" value="aktif" <?php if($row['ban_account']=='aktif') echo 'checked'?>>Banned <br>
                <input type="radio" name="ban_account" value="t" <?php if($row['ban_account']=='t') echo 'checked'?>>Buka Benned
                </div>
                
                <input type="submit" name="submit" class="btn btn-primary" value="Update">
                </form>
                
  		    </div>
        </div>		 
    </div>
 
 







<?php  include_once 'layout/footer.php';?>
