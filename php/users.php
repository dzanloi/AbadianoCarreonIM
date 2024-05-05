<?php
    session_start();
    include_once "connect.php";
    $outgoing_id = $_SESSION['id'];
    $sql = "SELECT * FROM tbluseraccount WHERE NOT userid = {$outgoing_id} ORDER BY userid DESC";
    $query = mysqli_query($connection, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>