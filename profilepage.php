<?php
 session_start();
 include 'php/connect.php';

 $id=$_SESSION['aimedid'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css\profile.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

</head>
<body>

    <div class="dashboard">
        <div class="sidebar">
            <div class="profile">
                <?php
                
                  
                ?>
                
                <header class="profile-header">
                    <div class="profilePicName">
                         
                    <img src="<?php
                   
                   echo 'images/'.$_SESSION['aimedprofile'];
                     
                    ?>"s alt="User profile picture" class="profile-image">
                        
                        <div class="profile-info">
                            <h1 class="profile-name">
                            <?php
                            $sql="SELECT * FROM tbluseraccount WHERE userid='$id'";
                            $result=mysqli_query($connection,$sql);
                            if($result){
                                $row=mysqli_fetch_assoc($result);
                                echo $row["username"];
                            }else{ echo "cannot be fetched";
                            }
                            ?></h1>
                        </div>

                    </div>
                    <p class="profile-bio">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.</p>
                </header>
                
                <section class="profile-stats">
                    <div class="profile-stat">
                        <h2 class="profile-stat-count">125</h2>
                        <p class="profile-stat-title">Posts</p>
                    </div>
                    <div class="profile-stat">
                        <h2 class="profile-stat-count">12.5k</h2>
                        <p class="profile-stat-title">Followers</p>
                    </div>
                    <div class="profile-stat">
                        <h2 class="profile-stat-count">150</h2>
                        <p class="profile-stat-title">Following</p>
                    </div>
                </section>
                
                
            </div>
        </div>


        <div class="main">
            <div class="header">
                <section class="profile-posts">
                    <h1 class="profile-posts-title">Recent Posts</h1>
                    <!-- Add the user's posts here -->
                </section>
            </div>
            
        </div>
    </div>






    <div class="circle-1"></div>
    <div class="circle-2"></div>
    <div class="circle-3"></div>

    



</body>
</html>