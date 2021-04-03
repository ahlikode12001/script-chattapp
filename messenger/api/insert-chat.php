<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = htmlentities($_SESSION['unique_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn,$_POST['message']);
        $chat_date = date('H:i:s');
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO tbl_messages (incoming_msg_id, outgoing_msg_id, msg, chat_date)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', '{$chat_date}')") or die();
        }
    }else{
        header("location: ../login.html");
    }


    
?>