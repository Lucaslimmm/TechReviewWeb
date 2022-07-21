<?php
   include_once 'header.php';
?>
        
        <!--Header-->
        <header class="infohead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-items-center">
                        <h1 class="text-white font-weight-bold">User Sign Up</h1>
                    </div>
                </div>
            </div>
        </header>

        <!--Login Form-->
        <br>
        <div class="signup">
        <div class="signupcontainer">
        <form action="includes/signup.inc.php" method="post">

        <?php
               if(isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p align=center>Fill in all fields!</P>";
                }
               else if($_GET["error"] == "invaliduid") {
                    echo"<p align=center>Choose a proper username!</P>";
               }
               else if($_GET["error"] == "invalidemail") {
                    echo"<p align=center>Choose a proper email!</P>";
               }
               else if($_GET["error"] == "passwordsdontmatch") {
                    echo"<p align=center>Passwords dosen't match!</P>";
               }
               else if($_GET["error"] == "stmtfailed"){
                    echo"<p align=center>Somethings went wrong, please try again!</P>";
               }
               else if($_GET["error"] == "usernametaken") {
                echo"<p align=center>Username already taken!</P>";
               }
               else if($_GET["error"] == "none") {
                echo"<p align=center>You have signed up!</P>";
               } 
            }
          ?>

              <label for="fname"><b>Full name</b></label>
              <input type="text" placeholder="Enter Name" name="name" required>
              <br>
              <br>

              <label for="Email"><b>E-mail</b></label>
              <input type="text" placeholder="Enter E-mail" name="email" required>
              <br>
              <br>
              
              <label for="Uid"><b>UserId</b></label>
              <input type="text" placeholder="Enter Userid" name="uid" required>
              <br>
              <br>
        
              <label for="Pwd"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="pwd" required>
              <br>
              <br>

              <label for="Pwdrepeat"><b>Re-enter Password</b></label>
              <input type="password" placeholder="Re-enter Password" name="pwdrepeat" required>
              <input type="hidden" name="roleid" value="2" class="form-control">
              <br>
              <br>

              <button type="submit" name="submit">Sign up</button>
              <br>
              <br>
              <span class="psw">Already have an account ? <a href="login.php">Sign in</a></span>
          
          </form>
          </div>
          </div>

<?php
   include_once 'footer.php';
?>