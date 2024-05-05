<?php 
    session_start();
    if(isset($_SESSION['id'])){
        include_once "connect.php";
        $outgoing_id = $_SESSION['id'];
        $incoming_id = mysqli_real_escape_string($connection, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM tblmessages LEFT JOIN tbluseraccount ON tbluseraccount.userid = tblmessages.senderid
                WHERE (senderid = {$outgoing_id} AND receiverid = {$incoming_id})
                OR (senderid = {$incoming_id} AND receiverid = {$outgoing_id}) ORDER BY messageid";
        $query = mysqli_query($connection, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['senderid'] === $outgoing_id){


                   
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['content'] .'</p>
                                </div>
                                </div>';
                }else{
                    $sql2 = mysqli_query($connection, "SELECT * FROM tblpictures WHERE userid = {$incoming_id}");
                    if(mysqli_num_rows($sql2) > 0){
                   $row2 = mysqli_fetch_assoc($sql2);
                   }
                    $output .= '<div class="chat incoming">
                                <img src="images/'.$row2['url'].'" alt="">
                                <div class="details">
                                    <p>'. $row['content'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>