<?php
   include_once "config.php";
   $id_report = $_GET["id_report"];
   $sql = "DELETE FROM `tbl_report` WHERE id_report = '$id_report'";
   $b=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tbl_report WHERE id_report = '$id_report'"));
   unlink('../files/user_report_img/'.$b['img'].'');
   if(mysqli_query($conn, $sql)){
	   echo "
	   <script>
		   alert('Data Berhasil di hapus!');
		   document.location.href = '../report-users.html?action=".md5(sha1('sukses'))."';
	   </script>
   ";
   } else{
	   echo "
	   <script>
		   alert('Data Gagal di hapus!');
		   document.location.href = '../report-users.html?action=".md5('gagal')."';
	   </script>
   ";
   }

?>