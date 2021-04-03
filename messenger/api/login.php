<?php 

include_once "config.php";

if (isset($_POST['submit'])) {

    $errorMsg = "";
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM tbl_account WHERE email = '$email'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            if (password_verify($password, $row['password'])){
                $status = "onlline";
                $sql2 = mysqli_query($conn, "UPDATE tbl_account SET status = '$status' WHERE unique_id = ".$row['unique_id']."");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    header('location:check_account.html');
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