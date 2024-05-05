<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM tblmessages WHERE (receiverid = {$row['userid']}
                OR senderid = {$row['userid']}) AND (senderid = {$outgoing_id} 
                OR receiverid = {$outgoing_id}) ORDER BY messageid DESC LIMIT 1";
        $query2 = mysqli_query($connection, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['content'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['senderid'])){
            ($outgoing_id == $row2['senderid']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['userid']) ? $hid_me = "hide" : $hid_me = "";

        $sql3 = mysqli_query($connection, "SELECT * FROM tblpictures WHERE userid = {$row['userid']}");
        if(mysqli_num_rows($sql3) > 0){
          $row3 = mysqli_fetch_assoc($sql3);
        }

        $output .= '<a href="chat.php?user_id='. $row['userid'] .'">
                    <div class="content">
                    <img src="images/'. $row3['url'] .'" alt="">
                    <div class="details">
                        <span>'. $row['username']. '</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>