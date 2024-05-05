document.querySelector('.navigations ul li:first-child a').addEventListener('click', function() {
    // event.preventDefault();
    
  });

  document.getElementById("logo").addEventListener(`click`, function() {
    window.location.href = "index.php";
  });

  function Login(){
    var x = document.getElementById("login_pop");
    var y = document.getElementById("register-pop");
    y.style.display ="none"
    if (x.style.display === "none") {
      x.style.display = "flex";
     
    } else {
      x.style.display = "none";
    }
  };

  function Register() {
      var x = document.getElementById("login_pop");
      x.style.display = "none";
      var y = document.getElementById("register-pop");
      if (y.style.display === "none") {
      
        y.style.display ="flex"
      } else {
        y.style.display = "none";
      }
  };
      document.getElementById('reg_btn').onclick =Register();
      document.getElementById('login_btn').onclick =Login();


