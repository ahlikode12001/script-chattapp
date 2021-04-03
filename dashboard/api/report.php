<?php
    include_once "config.php";

    if (isset($_POST['submit'])) {

    $errorMsg = "";

    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $categori = mysqli_real_escape_string($conn, $_POST['categori']);
    $massage_report = mysqli_real_escape_string($conn, $_POST['massage_report']);
    $report_Date =date("j-M-Y");

    if(!empty($categori) && !empty($massage_report)){
        if(filter_var($categori)){
            $sql = mysqli_query($conn, "SELECT * FROM tbl_report WHERE categori = '{$categori}'");
            if(mysqli_num_rows($sql) > 0){
                $errorMsg = " $categori - categori Sudah di pakai!";
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
                            if(move_uploaded_file($tmp_name,"../dashboard/files/user_report_img/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $insert_query = mysqli_query($conn, "INSERT INTO tbl_report (incoming_id, categori, massage_report, img, status,report_Date)
                                VALUES ({$incoming_id}, '{$categori}','{$massage_report}', '{$new_img_name}', 'Checking', '{$report_Date}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM tbl_report WHERE categori = '{$categori}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
 
                                        echo '<script>
                                        alert("Terima kasih sudah melapor");
                                        window.location.href="users.html";
                                        </script>';
                                        
                                    }else{
                                        $errorMsg = "categori email ini tidak ada!";
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