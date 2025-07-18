<?php include 'header.php'; ?>
<!-- Page Wrapper -->

<div class="page-wrapper">
  <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="page-title">About Page</h3>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
      <div class="col-md-6" style="display:none">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Primary Information</h4>
          </div>
          <div class="card-body">
            <form action="banner_chk.php?id=1&page=about" method="post" enctype="multipart/form-data">
              <?php $sql12 = "SELECT * FROM banner where sl_id=1";
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Banner Image</label>
                    <input class="form-control" type="file" name="image" >
                    <img src="<?php echo '../uploads/banner/'.$row['image']; ?>" height="50" width="100"/> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Seo Title</label>
                    <input type="text" class="form-control" name="seo_title"  value="<?php echo $row['seo_title']; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Seo Desc</label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="seo_description" ><?php echo $row['seo_description']; ?></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Seo Keywords</label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="(,) seperated" name="seo_tags"  ><?php echo $row['seo_tags']; ?></textarea>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Header</h4>
          </div>
          <div class="card-body">
            <form action="about_chk.php?id=1&page=about" method="post" enctype="multipart/form-data">
            <?php $sql12 = "SELECT * FROM about where sl_id=1";
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			?>
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
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Content</h4>
          </div>
          <div class="card-body">
            <form action="about_chk.php?id=2&page=about" method="post" enctype="multipart/form-data">
              <?php $sql12 = "SELECT * FROM about where sl_id=2";
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			?>
			  
              <div class="form-group">
                <label>Image</label>
                <input class="form-control" type="file" name="image" >
                <img src="<?php echo '../uploads/other/'.$row['image']; ?>" style="width:25%"/>
			  </div>
			
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
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Content</h4>
          </div>
          <div class="card-body">
            <form action="about_chk.php?id=3&page=about" method="post" enctype="multipart/form-data">
              <?php $sql12 = "SELECT * FROM about where sl_id=3";
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			?>
			 <div class="form-group">
                <label>Image</label>
                <input class="form-control" type="file" name="image" >
                <img src="<?php echo '../uploads/other/'.$row['image']; ?>" style="width:25%"/>
			  </div>
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
      
    </div>
  </div>
</div>
<!-- /Page Wrapper -->
</div>
<!-- /Main Wrapper -->
<?php include 'footer.php'; ?>