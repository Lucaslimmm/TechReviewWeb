<?php
include('../includes/dbh.inc.php');
include('message.php');
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
                                    <h4 class="page-title">Users Messages</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li class="active">
                                            Messages
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <?php include('message.php');?>
                                <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM contact_us";
                                        $query_run = mysqli_query($conn, $query);

                                        $id=1;
                                        if(mysqli_num_rows($query_run) > 0){
                                            foreach($query_run as $row){
                                                ?>
                                                <tr>
                                                     <td><?php echo $id++;?></td>
                                                     <td><?php echo $row["uname"];?></td>
                                                     <td><?php echo $row["uemail"];?></td>
                                                     <td><?php echo $row["phone"];?></td>
                                                     <td><?php echo $row["messages"];?></td>
                                                     <td><?php echo $row["Date"];?></td>                        
                                                     <td>
                                                        <form action="code.php" method="POST">
                                                        <input type="hidden" name="delete_cmt" value="<?php echo $row['id'];?>">
                                                        <button type="submit" name="cmt_delete" class="btn btn-danger">Delete</button>
                                                    </td>
                                                    </form>
                                                    </tr>
                                                <?php
                                            }
                                        }
                                        else{
                                            ?>
                                            <tr>
                                                <td colspan="6">No record found</td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        
                                    </tbody>
                                    </table>

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