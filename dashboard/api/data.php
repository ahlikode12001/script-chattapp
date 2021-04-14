<?php 
 
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM tbl_messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2) > 0){
            $result = htmlentities($row2['msg']);
        }else{
            $result ="Tidak Ada Pesan Tersedia!";
        }
        (strlen($result) > 26) ? $msg =  substr($result, 0, 26) . '...' : $msg = $result;
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "Anda: " : $you = "";
        ($row['status'] == "Onlline Now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= 
        '
        <li class="main-items friends">
        <a class="contacts-menu" href="type.html?user_id='. htmlentities($row['unique_id']) .'">
            
                <div class="avatar avatar-'.htmlentities($row['status']).'">
                    <img src="files/user_foto/'. htmlentities($row['img']) .'" alt="">
                </div>

                <div class="contacts-content">
                    <div class="contacts-info">
                        <h6 class="name-user text-truncate">'. htmlentities($row['fname']). " " . htmlentities($row['lname']) .'</h6>
                    </div>
               
                    <div class="contacts-texts">
                    '. htmlentities($you) . htmlentities($msg) .'
                    </div>

                </div>
            </a>
        </li>
        ';
    }
?>