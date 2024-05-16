<?php 
  session_start();
  include 'php/connect.php';
  ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teknopidu - Register</title>
        <link rel="stylesheet" href="css/register.css">
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

                <form method="post">
                    <!-- FIRST NAME AND LAST NAMEEEEEEEEEEEEEEEEEEE -->
                    <div class="row" style="display: flex; justify-content: space-evenly;">
                        <input type="text" placeholder="First name" name="txtfirstname" required style="width: 45%;">
                        <input type="text" placeholder="Last name" name="txtlastname" required style="width: 45%;">
                    </div>
                    
                    <!-- AGEEEEEEEEEEEEEEEEEEEEEEEEEEEE -->
                    <input type="number" placeholder="Age" name="txtage" required>

                    <div class="form-group" style="margin-bottom: 15px; justify-content: space-between; display: flex;">

                        <!-- GENDERRRRRRRRRRRRRRRRR -->
                        <label for="gender">Gender</label>
                        <select class="custom-select" required name="txtgender" id="gender" style="border-radius: 5px; padding: 3px; border: 1px solid #ccc;">
                            <option selected>Select one</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>



                        <!-- PROGRAMMMMMMMMMMMMMMMMMMMM -->
                        <label for="course">Program</label>
                        <select class="custom-select" required name="txtcourse" id="course" style="border-radius: 5px; padding: 3px; border: 1px solid #ccc;">
                            <option selected>Select one</option>
                            <option value="BSIT">BSIT</option>
                            <option value="BSN">BS Nursing</option>
                            <option value="BSCS">BSCS</option>
                            <option value="BSPsych">BS Psych</option>
                            <option value="BSCrim">BS Crim</option>
                            <option value="BSCE">BSCE</option>
                            <option value="BSArch">BS Arch</option>

                        </select>
                    </div>


                    <!-- EMAILLLLLLLLLL -->
                    <input type="email" placeholder="Email" name="txtemail" required>

                    <!-- USERNAMEEEEEEEEEEEEEEEEEE -->
                    <input type="text" placeholder="Username" name="txtusername" required>    

                    <!-- PASSWORDSSSSSSSSSSSSSSSSSSS -->
                    <div class="row" style="display: flex; justify-content: space-evenly;">
                        <input type="password" placeholder="Password" name="txtpassword" required style="width: 45%;">
                        <input type="password" placeholder="Confirm Password" name="checkPassword" required style="width: 45%;">
                    </div>  
                    



                    <div class="link">
                        <button name=btnRegister class="register" value="Register">Register</button>
                        <i class="fab fa-registered fa-sm fa-fw" style="color: #ff4c68;">Already have an account?</i>
                    </div>
                    <hr>
                    <div class="button">
                        <a href="login.php">Login Here</a>
                    </div>
                </form>
            </div>
        </div>


        



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>   
</html>




<?php	
    if(isset($_POST['btnRegister'])){	
        $course = $_POST['txtcourse'];
        //retrieve data from form and save the value to a variable
        //for tbluserprofile
        $fname = $_POST['txtfirstname'];		
        $lname = $_POST['txtlastname'];
        $gender = $_POST['txtgender'];
        $age = $_POST['txtage'];
        
        //for tbluseraccount
        $email = $_POST['txtemail'];		
        $uname = $_POST['txtusername'];
        $pword = $_POST['txtpassword'];
        $cpass= $_POST['checkPassword'];
       
        $sql2 = "SELECT * FROM tbluseraccount WHERE username='$uname'";
        $result = mysqli_query($connection, $sql2);
        $row = mysqli_num_rows($result);
        if($row == 0){

        
        //save data to tbluserprofile			
        $sql1 = "INSERT INTO tbluser (firstname, lastname, gender, age, course) VALUES ('$fname', '$lname', '$gender', '$age', '$course')";
        mysqli_query($connection, $sql1);
       
      
        //Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.
          $user_id =mysqli_insert_id($connection);
          $finpass=password_hash($pword,PASSWORD_DEFAULT);
          
            $sql = "INSERT INTO tbluseraccount (email,username,password,userid) VALUES ('$email', '$uname', '$finpass','$user_id')";
            mysqli_query($connection, $sql);
            $dflt="nothing";
  
            $sql3 = "INSERT INTO tblpreference (userid,preferedcourse,preferedgender,preferedminimumage,preferedmaximumage) VALUES ('$user_id','$dflt','$dflt','18','30')";
            mysqli_query($connection, $sql3);
            
            $sql4 = "INSERT INTO tblpictures (userid) VALUES ('$user_id')";
            mysqli_query($connection, $sql4);
        } else {
            echo "<script language='javascript'>
                        alert('Username already existing');
                  </script>";
        }    
    }
?>  