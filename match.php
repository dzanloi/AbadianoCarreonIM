<?php 
  session_start();
  include 'php/connect.php';
  $data= $_SESSION["id"];
  $profile= $_SESSION["profile"];

?>
<?php include_once "header.php"; ?>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/match.css?v1">
  <link rel="stylesheet" href="css/dashboard.css?v1">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://hammerjs.github.io/dist/hammer.min.js"></script>


  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Match</title>


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
       <a href="match.php">
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


  <section class="home-section" style="overflow:hidden;">
    <div class="header">
      <div class="text">Start Matching</div>
    </div>

    <!-- TODO: MAKE A TINDER-LIKE CAROUSEL -->
    <div class="tinder">
      <div class="tinder--status">
        <i class="fa fa-remove"></i>
        <i class="fa fa-heart"></i>
      </div>

      <div class="tinder--cards">
        <div class="tinder--card">
          <img src="images/nico.jpg">
          <h3>Nico Abadiano</h3>
          <p>He is gwapo</p>
        </div>
        <div class="tinder--card">
          <img src="images/darwin.jpg">
          <h3>Darwin Largoza</h3>
          <p>He is biot</p>
        </div>
        <div class="tinder--card">
          <img src="images/jl.jpg">
          <h3>John Loi</h3>
          <p>He is gwapoer</p>
        </div>
        <div class="tinder--card">
          <img src="images/brix.png">
          <h3>Brix Bitayo</h3>
          <p>I need gwapa.</p>
        </div>
        <div class="tinder--card">
          <img src="images/yana.png">
          <h3>Yana Paragoso</h3>
          <p>Hi.</p>
        </div>
      </div>

      <div class="tinder--buttons">
        <button id="nope"><i class="fa fa-remove"></i></button>
        <button id="love"><i class="fa fa-heart"></i></button>
      </div>

    </div>
    


  </section>


  <script>

    var tinderContainer = document.querySelector('.tinder');
    var allCards = document.querySelectorAll('.tinder--card');
    var nope = document.getElementById('nope');
    var love = document.getElementById('love');

    function initCards(card, index) {
      var newCards = document.querySelectorAll('.tinder--card:not(.removed)');

      newCards.forEach(function (card, index) {
        card.style.zIndex = allCards.length - index;
        card.style.transform = 'scale(' + (20 - index) / 20 + ') translateY(-' + 30 * index + 'px)';
        card.style.opacity = (10 - index) / 10;
      });
      
      tinderContainer.classList.add('loaded');
    }

    initCards();

    allCards.forEach(function (el) {
      var hammertime = new Hammer(el);

      hammertime.on('pan', function (event) {
        el.classList.add('moving');
      });

      hammertime.on('pan', function (event) {
        if (event.deltaX === 0) return;
        if (event.center.x === 0 && event.center.y === 0) return;

        tinderContainer.classList.toggle('tinder_love', event.deltaX > 0);
        tinderContainer.classList.toggle('tinder_nope', event.deltaX < 0);

        var xMulti = event.deltaX * 0.03;
        var yMulti = event.deltaY / 80;
        var rotate = xMulti * yMulti;

        event.target.style.transform = 'translate(' + event.deltaX + 'px, ' + event.deltaY + 'px) rotate(' + rotate + 'deg)';
      });

      hammertime.on('panend', function (event) {
        el.classList.remove('moving');
        tinderContainer.classList.remove('tinder_love');
        tinderContainer.classList.remove('tinder_nope');

        var moveOutWidth = document.body.clientWidth;
        var keep = Math.abs(event.deltaX) < 80 || Math.abs(event.velocityX) < 0.5;

        event.target.classList.toggle('removed', !keep);

        if (keep) {
          event.target.style.transform = '';
        } else {
          var endX = Math.max(Math.abs(event.velocityX) * moveOutWidth, moveOutWidth);
          var toX = event.deltaX > 0 ? endX : -endX;
          var endY = Math.abs(event.velocityY) * moveOutWidth;
          var toY = event.deltaY > 0 ? endY : -endY;
          var xMulti = event.deltaX * 0.03;
          var yMulti = event.deltaY / 80;
          var rotate = xMulti * yMulti;

          event.target.style.transform = 'translate(' + toX + 'px, ' + (toY + event.deltaY) + 'px) rotate(' + rotate + 'deg)';
          initCards();
        }
      });
    });

    function createButtonListener(love) {
      return function (event) {
        var cards = document.querySelectorAll('.tinder--card:not(.removed)');
        var moveOutWidth = document.body.clientWidth * 1.5;

        if (!cards.length) return false;

        var card = cards[0];

        card.classList.add('removed');

        if (love) {
          card.style.transform = 'translate(' + moveOutWidth + 'px, -100px) rotate(-30deg)';
        } else {
          card.style.transform = 'translate(-' + moveOutWidth + 'px, -100px) rotate(30deg)';
        }

        initCards();

        event.preventDefault();
      };
    }

    var nopeListener = createButtonListener(false);
    var loveListener = createButtonListener(true);

    nope.addEventListener('click', nopeListener);
    love.addEventListener('click', loveListener);

  </script>
  <script src="js/dashscript.js"></script>
</body>
</html>