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
          <h3 class="page-title">Orders</h3>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Orders</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table  id="example1">
                <thead>
                  <tr>
                    <th>#Id</th>
                     <th>Order Id</th>
                    <th>Product</th>
					<th>Date</th>
					<th>Payment</th>
					<th>Status</th>
                
                  </tr>
                </thead>
                <tbody>
                  <?php $sql124 = "SELECT distinct(order_id) FROM sk_order where coupon='".$_GET['referral_code']."' order by sl_id desc";
				$res124=mysqli_query($conn,$sql124);
				while($row124=mysqli_fetch_array($res124)){
				
				$sql = "SELECT * FROM sk_order where order_id=".$row124['order_id'];
				$res=mysqli_query($conn,$sql);
				$row=mysqli_fetch_array($res);
				?>
                  <tr>
                    <td><?php echo $row['sl_id']; ?></td>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php 
					
					$sql123 = "SELECT * FROM sk_order where order_id=".$row['order_id']." order by sl_id desc ";
    				$res123=mysqli_query($conn,$sql123);
    				$c=mysqli_num_rows($res123);
    		        ?>
			
					<div> <?php echo $c; ?> Products</div>
					 </td>
      
                    <td>	<?php 
								
echo date('Y-m-d H:i:s', strtotime('+330 minutes', strtotime($row['datetime'])));
 ?></td>
                    <td><?php echo $row['payment']; ?></td>
					<td><span class=""><?php echo $row['status']; ?></span></td>
                  
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
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <div class="row" id="update">
      <div class="col-md-12" style="padding:0;">
        <div class="card" style="margin:0;">
          <div class="card-header">
            <h4 class="card-title">Update Tracking Info</h4>
          </div>
          <div class="card-body">
            <form action="track_order.php" method="post" enctype="multipart/form-data">
              <input class="form-control" type="hidden" name="order_id" value="" id="order_id" >
              
                
				<div class="form-group">
                  <label>Tracking info</label>
                  <input class="form-control" type="text" name="track" value="" id="track" >
                 
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
  </div>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#example1').DataTable( {
        "order": [[ 0, "desc" ]],
         "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false
            }
        ]
    } );
} );
    </script>
</script>
<?php include 'footer.php'; ?>