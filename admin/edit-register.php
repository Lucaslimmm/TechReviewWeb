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
                                    <h4 class="page-title">Registered Users</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li class="active">
                                            Edit Users
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">
                        <div class="col-sm-6"> 

                        <?php
                                        if(isset($_POST['edit_btn'])){
                                            $id = $_POST['edit_id'];

                                            $query = "SELECT * FROM users WHERE usersId = '$id'";
                                            $query_run = mysqli_query($conn, $query);

                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $query){
                                        }
                                        ?>

                                       
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="edit_id" value="<?=$query['usersId'];?>">
                                    <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label for="">Name</label>
                                        <input type="text" name="Ename" value="<?=$query['usersName'];?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Email</label>
                                        <input type="email" name="Eemail" value="<?=$query['usersEmail'];?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">UID</label>
                                        <input type="text" name="Euid" value="<?=$query['usersUid'];?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Password</label>
                                        <input type="password" name="Epwd" value="<?=$query['usersPwd'];?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <button type="submit" name="updateuser" class="btn btn-primary">Update</button>
                                    </div>
                                    
                                    </div>
                                </form>
                                <?php
                                        }       
                                        }
                                    
                                    ?>   
                                
                                </div>      
                            </div>
                        </div>
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