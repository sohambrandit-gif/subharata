<?php include 'header.php'; ?>
<?php $sql12 = "SELECT * FROM user where sl_id=".$_GET['id'];
	  $res=mysqli_query($conn,$sql12);
	  $row=mysqli_fetch_array($res);
?>
<!-- Datatables CSS -->
<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
<!-- Page Wrapper -->
<div class="page-wrapper">
  <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="page-title">View User</h3>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <p><strong>Name:</strong> <?php echo $row['fname']; ?><?php echo $row['lname']; ?></p>
            <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
            <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
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
