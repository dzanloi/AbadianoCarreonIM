<?php 
  session_start();
 include 'php/connect.php';
?>
<?php	
	if(isset($_POST['btnLogin'])){
		$uname=$_POST['login-user'];
		$pwd=$_POST['login-txtpassword'];
		//check tbluseraccount if username is existing
		$sql ="SELECT * FROM tbluseraccount WHERE username='".$uname."'";
		
		$result = mysqli_query($connection,$sql);	
		
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
    $hashed_pass=$row['password'];

		
		if($count== 0){
			echo "<script language='javascript'>
						alert('username not existing.');
				  </script>";
		}else if(!password_verify($pwd,$hashed_pass)) {
			echo "<script language='javascript'>
						alert('Incorrect password');
				  </script>";
		}else{
			
			// header('location: dashboard.php');
      $rows=mysqli_fetch_assoc($result);
      $_SESSION['username']=$row['username'];
      $_SESSION['profile']=$row['pictureid'];
      $_SESSION["id"]=$row['userid'];
       
      header("Location: match.php");
      exit();
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teknopidu - Login</title>
        <link rel="stylesheet" href="css/login.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    </head>
    <body>
        
        <div class="container flex">

            

            <div class="facebook-page flex">
                <div class="text">
                    <div class="rowflex">
                        <img src="images/cit-logo.png" class="logo" alt="citlogo">
                        <h1>teknopidu</h1>
                    </div>
                    
                    <p>Find you true love anytime </p>
                    <p> around you on Teknopidu.</p>
                </div>
                <form action="login.php" method="post">
                    <input type="text" placeholder="Username" name="login-user" required>
                    <input type="password" placeholder="Password" name="login-txtpassword" required>
                    <div class="link">

                        <!-- LOGIN BUTTON -->
                        <input type="submit" name="btnLogin" class="login" value="Login">

                        <a href="#" class="forgot">Forgot password? boo</a>
                    </div>
                    <hr>
                    <div class="button">
                        <a href="register.php">Create new account</a>
                    </div>
                </form>
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>   
</html>