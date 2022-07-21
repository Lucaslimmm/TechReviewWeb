<?php
include('../includes/dbh.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App title -->
        <title>TechReview | Dashboard</title>
		<link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo"><span>NP<span>Admin</span></span><i class="mdi mdi-layers"></i></a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
            <?php include('includes/topheader.php');?>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
    <?php include('includes/leftsidebar.php');?>
            <!-- Left Sidebar End -->

    <!-- Page Content -->
    <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Register</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li class="active">
                                            Register Users
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

        <div class="row">
        <div class="form-group m-b-20">
        <form action="../includes/register-function.php" method="post">

        <?php
               if(isset($_GET["error"])) {
                if ($_GET["error"] == "wronginput") {
                    echo "<p align=center>Please try again!</P>";
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
          </form>
          </div>
          

    <!-- Footer -->
    <?php include('includes/footer.php');?>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->




</div>
<!-- END wrapper -->



<script>
var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="../plugins/switchery/switchery.min.js"></script>

<!-- Counter js  -->
<script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="../plugins/counterup/jquery.counterup.min.js"></script>

<!--Morris Chart-->
<script src="../plugins/morris/morris.min.js"></script>
<script src="../plugins/raphael/raphael-min.js"></script>

<!-- Dashboard init -->
<script src="assets/pages/jquery.dashboard.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

</body>
</html>