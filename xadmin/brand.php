<?php include 'header.php'; ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
  <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="page-title">Brand Page</h3>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Top Banner</h4>
          </div>
          <div class="card-body">
            <form action="banner_chk.php?id=4&page=brand" method="post" enctype="multipart/form-data">
              <?php $sql12 = "SELECT * FROM banner where sl_id=4";
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			?>
              <div class="form-group">
                <label>Banner Image</label>
                <input class="form-control" type="file" name="image" >
                <img src="<?php echo '../uploads/banner/'.$row['image']; ?>" height="50" width="100"/> </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php $sql12 = "SELECT * FROM brand order by sl_id";
			$res=mysqli_query($conn,$sql12);
			while($row=mysqli_fetch_array($res)){ ?>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Content</h4>
          </div>
          <div class="card-body">
            <form action="brand_chk.php?id=<?php echo $row['sl_id']; ?>&page=brand" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Banner Image</label>
                <input class="form-control" type="file" name="image" >
                <img src="<?php echo '../uploads/brand/'.$row['image']; ?>" height="50" width="100"/> </div>
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title"  value="<?php echo $row['title']; ?>">
              </div>
              <div class="form-group">
                <label>About Description</label>
                <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="description"><?php echo $row['description']; ?></textarea>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- /Page Wrapper -->
</div>
<!-- /Main Wrapper -->
<?php include 'footer.php'; ?>