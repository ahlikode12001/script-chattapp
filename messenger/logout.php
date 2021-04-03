<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "api/config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "offline";
            $sql = mysqli_query($conn, "UPDATE tbl_account SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: login.html");
            }
        }else{
            header("location: users.html");
        }
    }else{  
        header("location: login.html");
    }
?>