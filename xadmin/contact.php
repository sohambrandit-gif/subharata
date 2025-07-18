<?php include 'header.php'; ?>
<!-- Page Wrapper -->

<div class="page-wrapper">
  <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="page-title">Contact Page</h3>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Contact Details</h4>
          </div>
          <div class="card-body">
            <form action="contact_chk.php?id=1&page=contact" method="post" enctype="multipart/form-data">
              <?php $sql12 = "SELECT * FROM contact where sl_id=1";
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			?>
              <div class="form-group" >
                <label>Office</label>
                <input type="text" class="form-control" name="office1" required value="<?php echo $row['office1']; ?>">
              </div>
              <div class="form-group" >
                <label>Office2</label>
                <input type="text" class="form-control" name="office2" required value="<?php echo $row['office2']; ?>">
              </div>
			  
              <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" required value="<?php echo $row['phone']; ?>">
              </div>
              <div class="form-group">
                <label>Whatsapp</label>
                <input type="text" class="form-control" name="whatsapp" required value="<?php echo $row['whatsapp']; ?>">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" required value="<?php echo $row['email']; ?>">
              </div>
              <div class="form-group">
                <label>Contact Form Submit Email</label>
                <input type="text" class="form-control" name="contact_email" required value="<?php echo $row['contact_email']; ?>">
              </div>
              <div class="form-group">
                <label>Facebook</label>
                <input type="text" class="form-control" name="fb"  value="<?php echo $row['fb']; ?>">
              </div>
              <div class="form-group">
                <label>Twitter</label>
                <input type="text" class="form-control" name="tw"  value="<?php echo $row['tw']; ?>">
              </div>
              <div class="form-group">
                <label>Instagram</label>
                <input type="text" class="form-control" name="insta"  value="<?php echo $row['insta']; ?>">
              </div>
              <div class="form-group">
                <label>Linkedin</label>
                <input type="text" class="form-control" name="linkedin"  value="<?php echo $row['linkedin']; ?>">
              </div>
              <div class="form-group">
                <label>Youbube</label>
                <input type="text" class="form-control" name="youtube"  value="<?php echo $row['youtube']; ?>">
              </div>
			 <div class="form-group">
                <label>Footer Text</label>
                <input type="text" class="form-control" name="footer_text"  value="<?php echo $row['footer_text']; ?>">
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