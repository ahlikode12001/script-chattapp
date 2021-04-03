<?php 
//session and prevent users direct access
  session_start();
  include_once "api/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.html");
}

//session data unique_id
$unique_id = htmlentities($_SESSION['unique_id']);

//displays all tbl_account data
$sql = mysqli_query($conn, "SELECT * FROM tbl_account WHERE unique_id = '$unique_id'");
  if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
}

//checking account
if($row['ban_account'] =='t') {
    header("location: users.html");
}else{ ?>

<h1 style="text-align:center;margin-top:20rem;">Akun Anda Telah diban! 
<br>
<a href="logout.html?logout_id=<?= htmlentities($row['unique_id']);?>">Logout</a>
</h1>

<?php } ?>