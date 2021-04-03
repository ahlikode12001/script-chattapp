<?php 
// koneksi database
include 'config.php';
 
if (isset($_POST['submit'])) {

// menangkap data yang di kirim dari form
$user_id = $_POST['user_id'];
$ban_account = $_POST['ban_account'];

 
// update data ke database
mysqli_query($conn,"UPDATE tbl_account SET  ban_account='$ban_account' WHERE user_id='$user_id'");
 
echo '<script>
alert("Akun sudah di bebaskan");
window.location.href="banned-users.html?action=1048e7e95e9c72e3f630798bbcb560d5";
</script>';
}
?>