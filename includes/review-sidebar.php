<div class="col-md-4">

<!-- Search Widget -->
<div class="card mb-4">
  <h5 class="card-header">Search Reviews</h5>
  <div class="card-body">
         <form name="search" action="reviewsearch.php" method="post">
    <div class="input-group">
 
<input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
      <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">Go!</button>
      </span>
    </form>
    </div>
  </div>
</div>

<!-- Categories Widget -->
<div class="card my-4">
  <h5 class="card-header">Categories</h5>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <ul class="list-unstyled mb-0">
<?php $query=mysqli_query($con,"select id,CategoryName from reviewcategory");
while($row=mysqli_fetch_array($query))
{
?>

          <li>
            <a href="reviewcategory.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a>
          </li>
<?php } ?>
        </ul>
      </div>

    </div>
  </div>
</div>

<!-- Side Widget -->
<div class="card my-4">
  <h5 class="card-header">Recently Added</h5>
  <div class="card-body">
            <ul class="mb-0">
<?php
$query=mysqli_query($con,"select reviewpost.id as pid,reviewpost.PostTitle as posttitle from reviewpost left join reviewcategory on reviewcategory.id=reviewpost.CategoryId left join  reviewsubcategory on  reviewsubcategory.SubCategoryId=reviewpost.SubCategoryId limit 8");
while ($row=mysqli_fetch_array($query)) {

?>

<li>
            <a href="review-details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
          </li>
  <?php } ?>
</ul>
  </div>
</div>

</div>
