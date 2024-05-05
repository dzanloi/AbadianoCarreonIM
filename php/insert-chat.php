<?php 
    session_start();
    if(isset($_SESSION['id'])){
        include_once "connect.php";
        $outgoing_id = $_SESSION['id'];
        $incoming_id = mysqli_real_escape_string($connection, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($connection, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($connection, "INSERT INTO tblmessages (receiverid, senderid, content)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }


    
?>