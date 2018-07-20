<?php
  include 'header.php';

  if(isset($_POST['logout'])){
    session_unset();
  }
?>
            <form action="includes/login-inc.php" method="POST">

              <input class = "text" type="text" name="email" placeholder="Email"><br>
              <input class = "text" type="text" name="pwd" placeholder="Password"><br>

              <div class = "checkbox">
                <input type="checkbox" id="admin" name="admin" value="admin">
                <label for="admin" name="admin">Admin</label>
                <input type="checkbox" id="user" name="user" value="us">
                <label for="user" name="admin">User</label>
              </div>
              
                <input type="submit" name="submit" value="Login">

                <br>
                <a href="signup.php">sign up </a>

            </form>

          </div>
      </div>
    </div>
  </div>
  <!-- <script src="index.js"></script> -->
</body>
</html>
