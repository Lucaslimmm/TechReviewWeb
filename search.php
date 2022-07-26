<?php
   include_once 'header.php';
   include('includes/config.php');
?>

        <!--Header-->
        <header class="infohead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-items-center">
                        <h1 class="text-white font-weight-bold">TechReview</h1>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Page Content -->
    <div class="container">


     
<div class="row" style="margin-top: 4%">

<!-- Blog Entries Column -->
<div class="col-md-8">
    
<!-- Blog Post -->
<?php 
if($_POST['searchtitle']!=''){
$st=$_SESSION['searchtitle']=$_POST['searchtitle'];
}
$st;
       



if (isset($_GET['pageno'])) {
      $pageno = $_GET['pageno'];
  } else {
      $pageno = 1;
  }
  $no_of_records_per_page = 8;
  $offset = ($pageno-1) * $no_of_records_per_page;


  $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
  $result = mysqli_query($con,$total_pages_sql);
  $total_rows = mysqli_fetch_array($result)[0];
  $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.PostTitle like '%$st%' and tblposts.Is_Active=1 LIMIT $offset, $no_of_records_per_page");

$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "No record found";
}
else {
while ($row=mysqli_fetch_array($query)) {


?>

    <div class="card mb-4">

      <div class="card-body">
        <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
   
        <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary">Read More &rarr;</a>
      </div>
      <div class="card-footer text-muted">
        Posted on <?php echo htmlentities($row['postingdate']);?>
     
      </div>
    </div>
<?php } ?>

<ul class="pagination justify-content-center mb-4">
  <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
  <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
      <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
  </li>
  <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
      <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
  </li>
  <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
</ul>
<?php } ?>
 

    <!-- Pagination -->

  </div>

  <!-- Sidebar Widgets Column -->
<?php include('includes/sidebar.php');?>
</div>
<!-- /.row -->

</div>
<!-- /.container -->



<?php
   include_once 'footer.php';
?>