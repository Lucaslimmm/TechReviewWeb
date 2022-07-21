<?php
   include_once 'header.php';
   include 'includes/dbh.inc.php';
?>
        
        <!--Header-->
        <header class="infohead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-items-center">
                        <h1 class="text-white font-weight-bold">User Login</h1>
                    </div>
                </div>
            </div>
        </header>

        <!--Login Form-->
        <br>
        <div class="login">
          
            <div class="logincontainer">
            <form action="includes/login.inc.php" method="post">
           
           <?php
               if(isset($_GET["error"])) {
                if ($_GET["error"] == "wrongUid") {
                    echo "<p align=center>Wrong UserID !</P>";
                }
               else if($_GET["error"] == "wrongPassword") {
                    echo"<p align=center>Wrong Password !</P>";
               }
            }
            ?>
            
              <label for="uname"><b>UserID</b></label>
              <input type="text" placeholder="Enter UserID" name="uid" required>
              <br>
              <br>
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="pwd" required>
              <br>
              <br>
              <button type="submit" name="submit">Sign in</button>
              <br>
              <br>
              <span class="psw">Don't have an account ? <a href="signup.php">Sign Up</a></span>
            </div>
          </form>
    </div>

<?php
   include_once 'footer.php';
?>