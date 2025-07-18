<?php include 'header.php'; ?>
<!-- Datatables CSS -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css?v=1">
  

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.w3-display-topright {
    position: absolute;
    right: 0;
    top: 0;
    color: black;
    z-index: 9999;
    font-size: 31px;
}
</style>
<!-- Page Wrapper -->
<div class="page-wrapper">
  <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="page-title">Users</h3>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Users</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table  id="example1">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th>Date</th>
					<th>Status</th>
					<?php if( $_GET['type'] =='Influencer'){ ?><th>Social</th>
				   	<th>Influencer</th> <?php } ?>
                    <th>Action</th>
        
                  </tr>
                </thead>
                <tbody>
                   <?php 
        $sql12 = "SELECT * FROM user where valid=1 order by sl_id desc ";       
				$res=mysqli_query($conn,$sql12);
				while($row=mysqli_fetch_array($res)){
				?>
                  <tr>
                    <td><?php if( $row['influencer'] =='1'){ ?><i class="fe fe-user" style="color:green;"></i><?php } ?> <?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
                    <td><?php echo $row['referral_code']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['timestamp']; ?></td>
					<td><span class=""><?php if($row['valid'] == 0){ echo "Block"; }else{ echo "Active"; } ?></span></td>
					<?php if( $_GET['type'] =='Influencer'){ ?><td><?php if( $row['instagram_link'] !=''){ ?><a href="<?php echo $row['instagram_link']; ?>" target="_blank"><i class="fe fe-instagram"></i></a><?php } ?> <?php if( $row['facebook_link'] !=''){ ?><a href="<?php echo $row['facebook_link']; ?>" target="_blank"><i class="fe fe-facebook"></i></a><?php } ?></td>
			
                    <td> <?php if($row['influencer_verified']==0){ echo " Unverified"; }else{ echo " Verified"; } ?> </td>	 <?php } ?>			
                    <td><div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);"> 
                          <a class="dropdown-item" href="view_lead.php?id=<?php echo $row['sl_id']; ?>#update">View</a>
                          <div class="dropdown-divider"></div>
						  <?php if($row['valid'] == 0){?>
                          <a class="dropdown-item" href="lead_del.php?id=<?php echo $row['sl_id']; ?>&action=Active" >Active</a>
						  <?php }else{ ?>
						  <a class="dropdown-item" href="lead_del.php?id=<?php echo $row['sl_id']; ?>&action=Block" >Block</a>
						  <?php } ?>
						  <div class="dropdown-divider"></div>
                          <?php if($row['influencer_verified']==0){ ?>
                          <a class="dropdown-item" href="lead_del.php?id=<?php echo $row['sl_id']; ?>&action=Verified" > Verified</a>
                          <?php } else { ?>
                          <a class="dropdown-item" href="lead_del.php?id=<?php echo $row['sl_id']; ?>&action=Unverified" > Unverified</a>
                          <?php } ?>
                          <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="influencer_order.php?referral_code=<?php echo $row['referral_code']; ?>" > Influencer order</a>
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
  </div>
</div>
<!-- /Page Wrapper -->
</div>
<!-- /Main Wrapper -->

<style>
@media (min-width: 993px){
.w3-modal-content {
	width:50%;
}
}
</style>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#example1').DataTable( {
        "name": [[ 0, "desc" ]],
    
    } );
} );
    </script>
</script>
<?php include 'footer.php'; ?>
