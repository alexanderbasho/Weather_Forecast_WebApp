<html lang="el">
    <video autoplay muted loop id="backgroundVideo">
        <source src="background1.mp4" type="video/mp4">
      </video>
    <head>
        <title>Είσοδος/Εγγραφή στην πρόβλεψη καιρού Basho</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="formStylesheet.css">
    </head>
    <body>
      <div class="superclass">
          <div class="form">
            <div class="buttons">
              <div id="btn"></div>
              <button type="button" class="btn-style" onclick="loginbtn()">Είσοδος</button>
              <button type="button" class="btn-style" onclick="registerbtn()">Εγγραφή</button>
            </div>
            <form id="login" class="inputinfo" action="loginauthentication.php" method="post">
              <input type="text" class="inputfield" name="username" placeholder="Όνομα" required>
              <input type="password" class="inputfield" name="password" placeholder="Κωδικός" required>
              <button type="submit" class="submitbtn">Είσοδος</button>
            </form>
            <form id="register" class="inputinfo" action="registerauthentication.php" method="post">
              <input type="text" class="inputfield" name="username" placeholder="Όνομα" required>
              <input type="email" class="inputfield" name="email" placeholder="Email" required>
              <input type="password" class="inputfield" name="password" placeholder="Κωδικός" required>
              <button type="submit" class="submitbtn">Εγγραφή</button>
            </form>
          </div>  
      </div>  
      <script>
        var login = document.getElementById("login");
        var register = document.getElementById("register");
        var btnv = document.getElementById("btn");

        function registerbtn(){
          login.style.left = "-401px";
          register.style.left = "50px";
          btnv.style.left = "111px";
        }

        function loginbtn(){
          login.style.left = "50px";
          register.style.left = "450px";
          btnv.style.left = "0";
        }
      </script>
    </body>
</html>