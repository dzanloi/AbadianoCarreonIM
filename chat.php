<?php 
  session_start();
  include 'php/connect.php';
  if(!isset($_SESSION['id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
          $sql = mysqli_query($connection, "SELECT * FROM tbluseraccount WHERE userid = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
          $sql2 = mysqli_query($connection, "SELECT * FROM tblpictures WHERE userid = {$_SESSION["id"]}");
          if(mysqli_num_rows($sql) > 0){
            $row2 = mysqli_fetch_assoc($sql2);
          }
          
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="images/<?php echo $row2['url']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['username']?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="js/chat.js"></script>

</body>
</html>
