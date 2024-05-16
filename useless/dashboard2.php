<?php 
  session_start();
  include 'php/connect.php';
  $data= $_SESSION["id"];
  $profile= $_SESSION["profile"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard_styles.css?v=1">
</head>
<body>

    <div class="dashboard">
        <div class="sidebar">
            <div class="profile">
                <div class="profile-img-box">
                    
                    <img src=<?php
                    
                      $sql2 = "SELECT * FROM tblpictures WHERE pictureid='$profile'"; 
                      $result2 = mysqli_query($connection,$sql2);  

                      if($result2){
                       
                          $row2=mysqli_fetch_assoc( $result2 );
                          $_SESSION['url']=$row2['url'];
                          echo 'images/'.$_SESSION['url'];
                      
                      }
                    ?> alt="profilepic">
                </div>
                    <?php
                       
                            echo "<h1  class=name>" . $_SESSION['username'] . "</h1>";
                        
                    ?>
            </div>

            <div class="sidebar-items">
                <a href="#" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/heart.png" alt="">
                    </div>
                    <h4 class="si-name active">Matches</h4>
                </a>

                <a href="preference.php" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/preference.png" alt="">
                    </div>
                    <h4 class="si-name">Preferences</h4>
                </a>

                <a href="users.php" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/chat_req.png" alt="">
                    </div>
                    <h4 class="si-name">Chat Request</h4>
                </a>

                <a href="settings.php" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/settings.png" alt="">
                    </div>
                    <h4 class="si-name">Settings</h4>
                </a>

                <a href="#" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/logout.png" alt="">
                    </div>
                    <h4 class="si-name">Logout</h4>
                </a>
            </div>


        </div>


        <div class="main">
            <div class="header">
                
                    <a href="#" class="toflex">
                    <img class="puzzle" src="images/puzzle.png" alt="">
                    <h3>Stat Matching</h3>
                    </a>
               

              
                <div class="searchdiv">
                <form class="search-bar" method="post">
                    <input type="text" placeholder="Search..." name="txtSearch">
                    
                    <button name="btnSearch">Search</button>
                </form>
                
               
                    <table class="table">
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
                </div>

                <div class="profile">
                    <!-- TODO: BUTNGI PROFILE -->
                </div>
            </div>
            
        </div>
    </div>

    <div class="circle-1"></div>
    <div class="circle-2"></div>
    <div class="circle-3"></div>
</body>
</html>