<?php
    include_once "config.php";

    if (isset($_POST['submit'])) {

    $errorMsg = "";

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $join_date =date("j-M-Y");

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM tbl_account WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                $errorMsg = " $email - Email Sudah di pakai!";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"files/user_foto/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $status = "onlline";
                                $encrypt_pass = password_hash($password, PASSWORD_DEFAULT);
                                $insert_query = mysqli_query($conn, "INSERT INTO tbl_account (unique_id, fname, lname, email, password, img, status, join_date, ban_account)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}', '{$join_date}', 't')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM tbl_account WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        header('location: check_account.html');
                                    }else{
                                        $errorMsg = "Alamat email ini tidak ada!";
                                    }
                                }else{
                                    $errorMsg = "Ada yang salah. Silahkan coba lagi!";
                                }
                            }
                        }else{
                            $errorMsg = "Silakan unggah file gambar - jpeg, png, jpg";
                        }
                    }else{
                        $errorMsg = "Silakan unggah file gambar - jpeg, png, jpg";
                    }
                }
            }
        }else{
            $errorMsg = "$email Bukan Email Yang Valid!";
        }
    }else{
        $errorMsg = "Semua Data Harus Diisi!";
    }
}
?>