<?php 

 
  if(!isset($_SESSION["id"])){
    header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> <?php
    $sql = mysqli_query($connection, "SELECT * FROM tbluseraccount WHERE userid = {$_SESSION["id"]}");
    if(mysqli_num_rows($sql) > 0){
      $row = mysqli_fetch_assoc($sql);
    }
    echo $row['username'];
  ?>
  </title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>