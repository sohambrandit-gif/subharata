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
          <h3 class="page-title">Manufacture</h3>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Manufacture</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="datatable table table-stripped">
                <thead>
                  <tr>
                    <th>#id</th>
					<th>Image</th>
                    <th>Manufacture</th>
                    
                    <th>Ship-Rocket</th>
                    <th>Status</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $sql12 = "SELECT * FROM manufacture  order by position  ";
				$res=mysqli_query($conn,$sql12);
				while($row=mysqli_fetch_array($res)){
				?>
                  <tr>
                    <td><?php echo $row['position']; ?></td>
					<td><img src="<?php echo '../uploads/manufacture/'.$row['image']; ?>" height="50" width="50"/></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['ship_rocket']; ?></td>
                    <td> <?php if($row['valid']==0){ echo "Block"; }else{ echo "Active"; } ?> <?php if($row['featured']==0){ echo ""; }else{ echo "Featured"; } ?></td>
                    <td><div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                          <?php if($row['valid']==0){ ?>
                          <a class="dropdown-item" href="manufacture_action.php?id=<?php echo $row['sl_id']; ?>&action=Active" >Set Active</a>
                          <?php } else { ?>
                          <a class="dropdown-item" href="manufacture_action.php?id=<?php echo $row['sl_id']; ?>&action=Regular" >Set Block</a>
                          <?php } ?>
                           <?php if($row['featured']==0){ ?>
                          <a class="dropdown-item" href="manufacture_action.php?id=<?php echo $row['sl_id']; ?>&action=Featured" >Set Featured</a>
                          <?php } else { ?>
                          <a class="dropdown-item" href="manufacture_action.php?id=<?php echo $row['sl_id']; ?>&action=Normal" >Set Normal</a>
                          <?php } ?>
                          <a class="dropdown-item" href="manufacture.php?sl_id=<?php echo $row['sl_id']; ?>#update">Edit</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="manufacture_del.php?id=<?php echo $row['sl_id']; ?>" onclick="return confirm('Do you want to delete the item?')">Delete</a> </div>
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
            <h4 class="card-title">Add Manufacture</h4>
          </div>
          <div class="card-body">
            <form action="manufacture_chk.php?id=<?php echo $_GET['sl_id']; ?>" method="post" enctype="multipart/form-data">
              <?php if(isset($_GET['sl_id']) && $_GET['sl_id']!=''){  $sql12 = "SELECT * FROM manufacture where sl_id=".$_GET['sl_id'];
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
              }
			?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Banner Image</label>
                    <input class="form-control" type="file" name="banner_image" >
                    <?php if($row['image']!=''){ ?>
                    <img src="<?php echo '../uploads/manufacture/'.$row['image']; ?>" height="50" width="50"/>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Manufacture</label>
                    <input type="text" class="form-control" name="name" required value="<?php echo $row['name']; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Position</label>
                    <input type="text" class="form-control" name="position" required value="<?php echo $row['position']; ?>">
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label>Ship Rocket Manufacturer Address Name</label>
                    <input type="text" class="form-control" name="ship_rocket" required value="<?php echo $row['ship_rocket']; ?>">
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
    </div>
  </div>
</div>
<!-- /Page Wrapper -->
</div>
<!-- /Main Wrapper -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>
<?php include 'footer.php'; ?>