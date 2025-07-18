<?php include 'header.php'; ?>
<?php $menu_id=$_GET['cat']; ?>
<!-- Datatables CSS -->
<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
<!-- Page Wrapper -->
<div class="page-wrapper">
  <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="page-title">Sub Menu</h3>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
    <div class="row">

      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Sub Menu Items</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="datatable table table-stripped">
                <thead>
                  <tr>
                    <th>#id</th>
                    
					          <th>Sub Menu Items</th>
                    <th>Status</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $sql12 = "SELECT * FROM submenu  WHERE menu_id='$menu_id' ";
				$res=mysqli_query($conn,$sql12);
				$i=1;
        while($row=mysqli_fetch_array($res)){
				?>
                  <tr>
                    <td><?php echo $i; ?></td>
					
                    <td><?php echo $row['submenu']; ?></td>
                    <td> <?php if($row['valid']==0){ echo "Block"; }else{ echo "Active"; } ?></td>
                    <td><div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                          <?php if($row['valid']==0){ ?>
                          <a class="dropdown-item" href="submenu_action.php?id=<?php echo $row['submenu_id']; ?>&cat=<?php echo $_GET['cat']; ?>&action=Active" >Set Active</a>
                          <?php } else { ?>
                          <a class="dropdown-item" href="submenu_action.php?id=<?php echo $row['submenu_id']; ?>&cat=<?php echo $_GET['cat']; ?>&action=Regular" >Set Block</a>
                          <?php } ?>
                          <a class="dropdown-item" href="submenu.php?submenu_id=<?php echo $row['submenu_id']; ?>&cat=<?php echo $_GET['cat']; ?>#update">Edit</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="submenu_del.php?id=<?php echo $row['submenu_id']; ?>&cat=<?php echo $_GET['cat']; ?>" onclick="return confirm('Do you want to delete the item?')">Delete</a> </div>
                      </div></td>
                  </tr>

                  <?php 
                   $i++; } ?>
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
            <h4 class="card-title">Add Sub Menu</h4>
          </div>
          <div class="card-body">
            <form action="submenu_chk.php?cat=<?php echo $_GET['cat']; ?>" method="post" enctype="multipart/form-data">
              <?php $sql12 = "SELECT * FROM mainmenu where submenu_id=".$_GET['cat'];
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			?>
              <div class="row">
              
              <div class="col-md-6">
                <div class="form-group">
                  <label> Sub menu</label>
                  <input type="text" class="form-control" name="submenu" required value="<?php echo $row['menu']; ?>">
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