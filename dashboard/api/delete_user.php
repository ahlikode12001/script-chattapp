<?php
   include_once "config.php";

   $user_id = $_GET["user_id"];
   $sql = "DELETE FROM `tbl_account` WHERE user_id = '$user_id'";
   $b=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tbl_account where user_id = '$user_id'"));
   unlink('../../messenger/files/user_foto/'.$b['img'].'');
   if(mysqli_query($conn, $sql)){
	   echo "
	   <script>
		   alert('data berhasil dihapus!');
		   document.location.href = '../index.html';
	   </script>
   ";
   } else{
	   echo "
	   <script>
		   alert('data gagal ditambahkan!');
		   document.location.href = '../index.html';
	   </script>
   ";
   }

?>