<?php 
    $connection = new mysqli('localhost', 'root','', 'dbabadianof2');
    if(!$connection) {
        die(mysqli_error($mysqli));
    }
?>