<?php 
include_once 'header.php';
include('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit']))
{
  //Verifying CSRF Token
if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$comment=$_POST['comment'];
$postid=intval($_GET['nid']);
$st1='0';
$query=mysqli_query($con,"insert into tblcomments(postId,name,comment,status) values('$postid','$name','$comment','$st1')");
if($query):
  echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
  unset($_SESSION['token']);
else :
 echo "<script>alert('Something went wrong. Please try again.');</script>";  

endif;

}
}
}
?>

        <!--Header-->
        <header class="infohead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-items-center">
                        <h1 class="text-white font-weight-bold">Reviews</h1>
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
$pid=intval($_GET['nid']);
$query=mysqli_query($con,"select reviewpost.PostTitle as posttitle,reviewpost.PostImage,reviewcategory.CategoryName as category,reviewcategory.id as cid,reviewsubcategory.Subcategory as subcategory,reviewpost.PostDetails as postdetails,reviewpost.PostingDate as postingdate,reviewpost.PostUrl as url from reviewpost left join reviewcategory on reviewcategory.id=reviewpost.CategoryId left join  reviewsubcategory on  reviewsubcategory.SubCategoryId=reviewpost.SubCategoryId where reviewpost.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>

    <div class="card mb-4">

      <div class="card-body">
        <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
        <p><b>Category : </b> <a href="reviewcategory.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> |
          <b>Sub Category : </b><?php echo htmlentities($row['subcategory']);?> <b> Posted on </b><?php echo htmlentities($row['postingdate']);?></p>
          <hr />

<img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">

        <p class="card-text"><?php 
$pt=$row['postdetails'];
        echo  (substr($pt,0));?></p>
       
      </div>
      <div class="card-footer text-muted">
       
     
      </div>
    </div>
<?php } ?>
 
  </div>
     
<!-- Sidebar Widgets Column -->
<?php include('includes/review-sidebar.php');?>
</div>


<?php
    if (isset($_SESSION['useruid'])) {?>
    
    <!---Comment Section --->

 <div class="row" style="margin-top: -7%">
   <div class="col-md-8">
<div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form name="Comment" method="post">
      <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']);?>">
 <div class="form-group">
 <input class="form-control" name="name" type="text" value="<?php echo $_SESSION["useruid"]?>" data-sb-validations="required" />
</div>

                <div class="form-group">
                  <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
          </div>

  <!---Comment Display Section --->
   <div class="row" style="margin-top: -6%">
   <div class="col-md-8">
   <div class="card my-4">
            <h5 class="card-header">Comments:</h5>
   <?php 
   $sts=1;
   $query=mysqli_query($con,"select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
   while ($row=mysqli_fetch_array($query)) {
   ?>
   <div class="card-body">
   <div class="media mb-4">

          <img class="d-flex mr-3 rounded-circle" src="assets/img/usericon.png" alt="">  
          <div class="media-body">
              <h5 class="mt-0"><?php echo htmlentities($row['name']);?> <br />
                  <span style="font-size:11px;"><b>at</b> <?php echo htmlentities($row['postingDate']);?></span>
            </h5>
           
             <?php echo htmlentities($row['comment']);?>            </div>
          </div>
<?php } ?>
          </div>
          </div>
          </div>
        </div>
      </div>
    </div>
   </div>
                <?php

                }else{
                ?>
               
    <!---Comment Display Section --->
   <div class="row" style="margin-top: -6%">
   <div class="col-md-8">
   <div class="card my-4">
            <h5 class="card-header">Comments:</h5>
   <?php 
   $sts=1;
   $query=mysqli_query($con,"select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
   while ($row=mysqli_fetch_array($query)) {
   ?>
   <div class="card-body">
   <div class="media mb-4">

          <img class="d-flex mr-3 rounded-circle" src="assets/img/usericon.png" alt="">  
          <div class="media-body">
              <h5 class="mt-0"><?php echo htmlentities($row['name']);?> <br />
                  <span style="font-size:11px;"><b>at</b> <?php echo htmlentities($row['postingDate']);?></span>
            </h5>
           
             <?php echo htmlentities($row['comment']);?>            </div>
          </div>
<?php } ?>
          </div>
          </div>
          </div>
        </div>
      </div>
    </div>


                <?php } ?>
  
      <?php include('footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>