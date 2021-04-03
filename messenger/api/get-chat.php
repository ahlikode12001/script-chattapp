<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = htmlentities($_SESSION['unique_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM tbl_messages LEFT JOIN tbl_account ON tbl_account.unique_id = tbl_messages.outgoing_msg_id
                WHERE (outgoing_msg_id = '$outgoing_id' AND incoming_msg_id = '$incoming_id')
                OR (outgoing_msg_id = '$incoming_id' AND incoming_msg_id = '$outgoing_id') ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= 
                    '
                    <div class="chat-message-right pb-4">
                    <div>
                        <img src="../files/user_foto/'.htmlentities($row['img']).'" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                    </div>
                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                            <div class="font-weight-bold mb-1">'. htmlentities($row['fname']) .' '. htmlentities($row['lname']) .'</div>    
                            <p>'. htmlentities($row['msg']) .'</p>
                     </div>
                </div>
                    ';
                }else{
                    $output .= 
                    '
                    <div class="chat-message-left pb-4">
                    <div>
                        <img src="../files/user_foto/'.htmlentities($row['img']).'" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                    </div>
                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                            <div class="font-weight-bold mb-1">'. htmlentities($row['fname']) .' '. htmlentities($row['lname']) .'</div>
                             <p>'. htmlentities($row['msg']) .'</p>
                        </div>
                </div>
                    ';
                }
            }
        }else{
            $output .= '<div class="alert alert-warning text-center" role="alert">
                            Pesan dienkripsi ujung ke ujung. Tidak ada orang di luar obrolan ini, bahkan Situs ini, yang dapat membaca atau mendengarkan mereka. 
                            <a href="">Klik untuk mempelajari lebih lanjut.</a>
                        </div>';
        }
        echo $output;
    }else{
        header("location: ../login.html");
    }

?>