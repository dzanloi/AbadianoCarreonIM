<?php 
  session_start();
  include 'php/connect.php';
  if(!isset($_SESSION["id"])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
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
            if(mysqli_num_rows($sql) > 0){
              $row2 = mysqli_fetch_assoc($sql2);
            }
          ?>
          <img src="images/<?php echo $row2['url']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['username']?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
<!-- <a href="php/logout.php?logout_id=<?php echo $row['userid']; ?>" class="logout">Logout</a> -->
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="js/users.js"></script>

</body>
</html>
