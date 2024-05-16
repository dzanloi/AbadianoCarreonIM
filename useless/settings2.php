<?php
 session_start();
 include 'php/connect.php';
 $data= $_SESSION["id"];
?>
 
 
 <?php
    if(isset($_POST['btndelete'])){
    
        $sql2 = "DELETE FROM tbluser WHERE userid='$data'";
        $result2 = mysqli_query($connection, $sql2);
        echo "<script>alert('Account Deleted');</script>";
        header("Location: index.php");
        }
?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="css/settings.css">
</head>
<body>
 
    <div class="dashboard">
    <div class="sidebar">
            <div class="profile">
                <div class="profile-img-box">
                    
                    <img src=<?php
                      $sql = "SELECT * FROM tbluseraccount WHERE userid='$data'"; 
                      $result = mysqli_query($connection,$sql);  
                      $row=mysqli_fetch_assoc( $result );
                      $pictureid=$row['pictureid'];
                      $sql2 = "SELECT * FROM tblpictures WHERE pictureid='$pictureid'"; 
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
                <a href="#" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/heart.png" alt="">
                    </div>
                    <h4 class="si-name active">Matches</h4>
                </a>

                <a href="preference.php?data=<?php
                                $result = mysqli_query($connection,$sql);  
                                if($result){
                                    $row=mysqli_fetch_assoc( $result );
                                    echo $row['userid'];
                                }?>" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/preference.png" alt="">
                    </div>
                    <h4 class="si-name">Preferences</h4>
                </a>

                <a href="#" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/chat_req.png" alt="">
                    </div>
                    <h4 class="si-name">Chat Request</h4>
                </a>

                <a href="settings.php?data=<?php
                                $result = mysqli_query($connection,$sql);  
                                if($result){
                                    $row=mysqli_fetch_assoc( $result );
                                    echo $row['userid'];
                                }?>" class="sidebar-item">
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


        <!-- RIGHT SIDE -->
        <div class="main">
            <div class="header">
                <h1>Edit Profile</h1>
            </div>
 
            <!-- 1st ROW -->
            <div class="details">
                <form class="Fields" method="post">
                    <input type="text" placeholder="Usernamesauser" name="username">
                    <button class="pro" type="submit" name="btnchangeusername">
                        <div class="pro-img-box" >
                            <img src="images/edit.png" alt="">
                        </div>
                    </button>
                </form>
 
                <form class="Fields" method="post">
                    <input type="text" placeholder="Email" name="email">
                    <button class="pro" type="submit" name="btnchangeemail">
                        <div class="pro-img-box" >
                            <img src="images/edit.png" alt="">
                        </div>
                    </button>
                </form>
   
            </div>
 
            <!-- 2nd ROW -->
            <form class="details" method="post">
            <div class="Fields">
 
 
                <input type="password" placeholder="Password"  name="password">
                    <button class="pro" type="submit" name="btnchangeusername" style="visibility: hidden; ">
                        <div class="pro-img-box" >
                            <img src="images/edit.png" alt="">
                        </div>
                    </button>
                </div>
 
 
 
                <div class="Fields">
                    <input type="password" placeholder="Confirm Password" name="cpassword">
                    <button class="pro" type="submit" name="btnchangepassword">
                        <div class="pro-img-box" >
                            <img src="images/edit.png" alt="">
                        </div>
                    </button>
                </div>
 
                <button class="pro" type="submit" name="btndelete">
                    <p style="color: white;">DELETE ACCOUNT</p>        
                </button>
   
 
            </form>
           
        </div>
        <!-- END OF RIGHT SIDE -->
    </div>
 
    <div class="circle-1"></div>
    <div class="circle-2"></div>
    <div class="circle-3"></div>
</body>
</html>
 









<?php  
    if(isset($_POST['btnchangeusername'])){
        $uname=$_POST['username'];
        if($uname==""){
 
        }
        else{
        $sql ="UPDATE tbluseraccount SET username = '".$uname."' WHERE userid='".$data."'";
        $result = mysqli_query($connection,$sql);  
    }
}
?>
 
<?php  
    if(isset($_POST['btnchangeemail'])){
        $email=$_POST['email'];
        $sql ="UPDATE tbluseraccount SET email = '".$email."' WHERE userid='".$data."'";
        $result = mysqli_query($connection,$sql);              
    }
?>
 
<?php  
    if(isset($_POST['btnchangepassword'])){
 
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        if($password==$cpassword){
            $sql ="UPDATE tbluseraccount SET password = '".$cpassword."' WHERE userid='".$data."'";
            $result = mysqli_query($connection,$sql);  
        }else{
           
        }
               
    }
?>