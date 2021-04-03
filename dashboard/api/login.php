<?php 

include_once "config.php";

if (isset($_POST['submit'])) {

    $errorMsg = "";
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM tbl_configration WHERE email = '$email'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            if (password_verify($password, $row['password'])){
                $status = "a";
                $sql2 = mysqli_query($conn, "UPDATE tbl_configration SET a = '$status' WHERE id_config = ".$row['id_config']."");
                if($sql2){
                    $_SESSION['id_config'] = $row['id_config'];
                    header('location:home.html?type='.md5('ww').'');
                }else{
                    $errorMsg = 'Maaf, Sistem kami sedang bermasalah!';
                }
            }else{
                $errorMsg =  'Email Atau Kata Sandi Anda Salah!';
            }
        }else{
            $errorMsg = "$email - Data Email Tidak Ada!";
        }
    }else{
        $errorMsg =  'Semua Data Harus diisi!';
    }
}

?>