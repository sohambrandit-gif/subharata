<?php include 'header.php'; ?>
<!-- Datatables CSS -->
<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
<!-- Page Wrapper -->
<div class="page-wrapper">
  <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="page-title">Brand</h3>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
    <div class="row">

      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Brand</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="datatable table table-stripped">
                <thead>
                  <tr>
                    <th>#id</th>
                    
					          <th>Brand</th>
                    <th>Status</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $sql12 = "SELECT * FROM brand  order by sl_id desc ";
				$res=mysqli_query($conn,$sql12);
				while($row=mysqli_fetch_array($res)){
				?>
                  <tr>
                    <td><?php echo $row['sl_id']; ?></td>
					
                    <td><?php echo $row['brand']; ?></td>
                    <td> <?php if($row['valid']==0){ echo "Block"; }else{ echo "Active"; } ?></td>
                    <td><div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                          <?php if($row['valid']==0){ ?>
                          <a class="dropdown-item" href="mainmenu_action.php?id=<?php echo $row['sl_id']; ?>&action=Active" >Set Active</a>
                          <?php } else { ?>
                          <a class="dropdown-item" href="mainmenu_action.php?id=<?php echo $row['sl_id']; ?>&action=Regular" >Set Block</a>
                          <?php } ?>
                          <a class="dropdown-item" href="mainmenu.php?sl_id=<?php echo $row['sl_id']; ?>#update">Edit</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="mainmenu_del.php?id=<?php echo $row['sl_id']; ?>" onclick="return confirm('Do you want to delete the item?')">Delete</a> </div>
                      </div></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row" id="update">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Add Brand</h4>
          </div>
          <div class="card-body">
            <form action="mainmenu_chk.php?id=<?php echo $_GET['sl_id']; ?>" method="post" enctype="multipart/form-data">
              <?php
              if(isset($_GET['sl_id']) && $_GET['sl_id']!=''){ 
              $sql12 = "SELECT * FROM brand where sl_id=".$_GET['sl_id'];
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
              }
			?>
              <div class="row">
              
              <div class="col-md-6">
                <div class="form-group">
                  <label> Brand Name</label>
                  <input type="text" class="form-control" name="brand" required value="<?php echo $row['brand']; ?>">
                </div>
              </div>
              
            
              <div class="col-md-12" align="right">
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
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>
<?php include 'footer.php'; ?>