<?php 
  session_start();
  include 'php/connect.php';
  $data= $_SESSION["id"];
  $profile= $_SESSION["profile"];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/dashboard.css">
      <meta charset="UTF-8">
      <title>Dashboard</title>

      <!-- Boxicons CDN Link -->
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

<body>
<div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus icon'></i> -->
        <div class="logo_name">teknopidu</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>

    <ul class="nav-list">
      <!-- SEARCHHHHHHHHHHH -->
      <li>
        <form method="post">
          <button class='bx bx-search' name="btnSearch" style="border-radius: 10px; height:100%; width: 50px; border: none;"></button>
         <input type="text" placeholder="Search..." name="txtSearch" style="color: black;">
         <span class="tooltip">Search</span>
        </form>

      </li>
      <table class="table" style="background-color: white; border-radius: 10px; width: 100%; text-decoration: none;">
                      <?php
                      if(isset($_POST['btnSearch'])){
                          $search=$_POST['txtSearch'];
                          // $sql="Select * from 'useraccount' where acctid= '$search' or username= '$search'";
                          $sql="SELECT * FROM tbluseraccount WHERE useraccountid = '$search' OR username = '$search'";

                          $result=mysqli_query($connection,$sql);
                          if($result){
                          if(mysqli_num_rows($result) >0){
                              while($row=mysqli_fetch_assoc($result)) {
                                  $aimed=$row['pictureid'];
                                
                                  $_SESSION['aimedid']= $row['userid'];
                                  $sql4="SELECT * FROM tblpictures WHERE pictureid ='$aimed'";
                                  $result4=mysqli_query($connection,$sql4);
                                  $row4=mysqli_fetch_assoc($result4);

                                  $_SESSION['aimedprofile']= $row4['url'];
                                 
                                  echo '<tbody>
                                  <tr>
                                  <td> <img class="miniprofile" src="images/'.$row4['url'].'" alt="profile" style="position:relative; height:50%; width:50%;"></td>
                                  <td><a href="profilepage.php">'.$row['username'].'</a></td>
                                  
                                  </tr>
                                  </tbody>';
                              }
                       
                          } }else{
                              echo  "No Record Found!";
                          }
                      }?>
              
           
      </table>


      <!-- DASHBOARDDDDDDDDDDDDDDDD -->
      <!-- <li>
        <a href="dashboard.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li> -->


      <!-- MATCHESSSSSS -->
      <li>
       <a href="dashboard.php">
         <i class='bx bx-user' ></i>
         <span class="links_name" id="startmatchingid">Start Matching</span>
       </a>
       <span class="tooltip" >Start Matching</span>
     </li>

      <!-- MESSAGEEEEEEEEEEEEE -->
     <li>
       <a href="users.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Messages</span>
       </a>
       <span class="tooltip">Messages</span>
     </li>


    <!-- SAVED USERSSSSSSS -->
     <li>
       <a href="#">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Saved</span>
       </a>
       <span class="tooltip">Saved</span>
     </li>


     <!-- SETTTINGSSSSSSS -->
     <li>
       <a href="settings.php">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Settings</span>
       </a>
       <span class="tooltip">Settings</span>
     </li>

     <li class="profile">
         <div class="profile-details">
          <img src=<?php      
                      $sql2 = "SELECT * FROM tblpictures WHERE pictureid='$profile'"; 
                      $result2 = mysqli_query($connection,$sql2);  

                      if($result2){
                          $row2=mysqli_fetch_assoc( $result2 );
                          $_SESSION['url']=$row2['url'];
                          echo 'images/'.$_SESSION['url'];
                      }
                    ?> alt="profilepic">
           <div class="name_job">
             <!-- <div class="name">Janloi</div> -->
              <?php
                echo "<h1  class=name>" . $_SESSION['username'] . "</h1>";
              ?>
           </div>
           
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li>
    </ul>
  </div>


  <section class="home-section">
  <div class="header">
    <div class="text">Chats | Messages</div>
  </div>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($connection, "SELECT * FROM tbluseraccount WHERE userid = {$_SESSION["id"]}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            $sql2 = mysqli_query($connection, "SELECT * FROM tblpictures WHERE userid = {$_SESSION["id"]}");
            if(mysqli_num_rows($sql2) > 0){
              $row2 = mysqli_fetch_assoc($sql2);
            }
          ?>
          <img src="images/<?php echo $row2['url']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['username']?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
      </header>
      <div class="search">
        <span class="text">Select a user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
      
      </div>
    </section>
  </div>
  </section>




  <script src="js/dashscript.js"></script>
</body>
</html>