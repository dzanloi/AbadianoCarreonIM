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
    <title>PREFERENCE</title>
    <link rel="stylesheet" href="css/preference.css">
</head>
<body>

    <div class="dashboard">
        <div class="sidebar">
            <div class="profile">
                <div class="profile-img-box">
                    
                <img src=<?php
                     
                      $sql2 = "SELECT * FROM tblpictures WHERE pictureid=' $profile'"; 
                      $result2 = mysqli_query($connection,$sql2);  

                      if($result2){
                          $row2=mysqli_fetch_assoc( $result2 );
                          echo 'images/'  .$row2['url'];
                      }
                    ?> alt="profilepic">
                   
                </div>
                    <?php
                        $sql = "SELECT * FROM tbluseraccount WHERE userid='$data'"; 
                        $result = mysqli_query($connection,$sql);  
                        if($result){
                            $row=mysqli_fetch_assoc( $result );
                            echo "<h1  class=name>" . $row['username'] . "</h1>";
                        }
                    ?>
            </div>

            <div class="sidebar-items">
                <a href="dashboard.php" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/heart.png" alt="">
                    </div>
                    <h4 class="si-name">Matches</h4>
                </a>

                <a href="preferece.php" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/preference.png" alt="">
                    </div>
                    <h4 class="si-name active">Preferences</h4>
                </a>

                <a href="#" class="sidebar-item">
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

                <a href="logout.php?logout=true" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/logout.png" alt="">
                    </div>
                    <h4 class="si-name">Logout</h4>
                </a>
            </div>

        </div>

        <div class="main">
            <div class="header">
                <h1>Set Preference</h1>
            </div>

            <form method="post" class="details">

            <select name="preferedgender" id="cars">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="both">Both</option>
            </select>
                <input type="number" id="minimumage"  placeholder="Minimum age" name="minage"><br>
                <input type="number" id="maximumage"  placeholder="Maximum age" name="maxage"><br>
                <input type="text" id="preferedcourse" placeholder="Prefered course" name="course"><br>
                
                <input type="submit"  name="updatePreference" id="submit" value="update preference">
              
            </from>


        </div>
    </div>

    <div class="circle-1"></div>
    <div class="circle-2"></div>
    <div class="circle-3"></div>
</body>
</html>

<?php	
    if(isset($_POST['updatePreference'])){		
        $gender = $_POST['preferedgender'];		
        $minage = $_POST['minage'];
        $maxage = $_POST['maxage'];
        $course = $_POST['course'];
        $sql2 = "UPDATE tblpreference SET preferedgender = '$gender', preferedminimumage = '$minage', preferedmaximumage = '$maxage', preferedcourse = '$course' WHERE userid = '$data'";
        $result = mysqli_query($connection, $sql2);
        
    }
?>  