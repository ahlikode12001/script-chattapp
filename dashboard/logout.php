<?php
    session_start();
    if(isset($_SESSION['id_config'])){
        include_once "api/config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "1";
            $sql = mysqli_query($conn, "UPDATE tbl_configration SET a = '{$status}' WHERE id_config={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header('location: login.html?back='.md5('login').'');
            }
        }else{
            header('location: home.html?type='.md5('ww').'');
        }
    }else{  
        header('location: login.html?back='.md5('login').'');
    }
?>