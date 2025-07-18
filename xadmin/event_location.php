<?php include 'header.php'; ?>
<!-- Datatables CSS -->
<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
<!-- Page Wrapper -->
<div class="page-wrapper">
  <div class="content container-fluid">
    <!-- Page Header -->
     <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet" async>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js" defer="defer"></script>
    <script type="text/javascript" defer="defer">
    $(document).ready(function() {
      $('#description').summernote({
		height: 300,
        tabsize: 2,
        followingToolbar: true,
		 callbacks: {
        onImageUpload: function(files) {
            sendFile(files[0]);
				}
			}
      });
    });
  </script>
    <script type="text/javascript">
  function sendFile(file) {
  alert( 'Image uploading under process, may take some time.');
    data = new FormData();
    data.append("file", file);
    url = "ajax_blog_image_upload.php";
    $.ajax({
      data: data,
      type: "POST",
      url: url,
      cache: false,
      contentType: false,
      processData: false,
      success: function (url) {
	  	//console.log(url)
		var image = $('<img>').attr('src', url);
		$('#description').summernote("insertNode", image[0]);
      }
    });
  }
</script>
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="page-title">Add Locations</h3>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Add Locations for <?php echo get_event($_GET['event_id']); ?></h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="datatable table table-stripped">
                <thead>
                  <tr>
                    <th>#id</th>
                    <th>event_id</th>
                    <th>location</th>
                    <th>pin</th>
                    <th>date</th>
                    <th>contact_no</th>
                    <th>valid</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                  if($_GET['event_id'] != ''){
                       $sql12 = "SELECT * FROM event_location where event_id= ".$_GET['event_id']." order by sl_id desc ";
                  }else{
                       $sql12 = "SELECT * FROM event_location  order by sl_id desc ";
                  }
                  
				$res=mysqli_query($conn,$sql12);
				while($row=mysqli_fetch_array($res)){
				?>
                  <tr>
                    <td><?php echo $row['sl_id']; ?></td>
                    <td><?php echo $row['event_id']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['pin']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['contact_no']; ?></td>
                    <td><?php if($row['valid']==0){ echo "Block"; }else{ echo "Active"; } ?> <?php if($row['featured']==0){ echo ""; }else{ echo "Featured"; } ?></td>
                    <td><div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                          <?php if($row['valid']==0){ ?>
                          <a class="dropdown-item" href="event_location_action.php?id=<?php echo $row['sl_id']; ?>&event_id=<?php echo $_GET['event_id']; ?>&action=Active" >Set Active</a>
                          <?php } else { ?>
                          <a class="dropdown-item" href="event_location_action.php?id=<?php echo $row['sl_id']; ?>&event_id=<?php echo $_GET['event_id']; ?>&action=Regular" >Set Block</a>
                          <?php } ?>
						   
                           
                          <a class="dropdown-item" href="event_location.php?sl_id=<?php echo $row['sl_id']; ?>&event_id=<?php echo $_GET['event_id']; ?>&#update">Edit</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="event_location_del.php?id=<?php echo $row['sl_id']; ?>&event_id=<?php echo $_GET['event_id']; ?>" onclick="return confirm('Do you want to delete the item?')">Delete</a> </div>
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
            <h4 class="card-title">Add Event Location</h4>
          </div>
          <div class="card-body">
            <form action="event_location_chk.php?id=<?php echo $_GET['sl_id']; ?>" method="post" enctype="multipart/form-data">
              <?php 
              
              if(isset($_GET['sl_id']) && $_GET['sl_id'] !=''){
              $sql12 = "SELECT * FROM event_location where sl_id=".$_GET['sl_id'];
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
              }
           
			?>
      <input class="form-control" type="hidden" name="event_id" value="<?php echo $_GET['event_id']; ?>" >
			 <div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Date</label>
            <input class="form-control" type="date" name="date" value="<?php echo $row['date']; ?>">
        </div>
    </div>   
    <div class="col-md-4">
        <div class="form-group">
            <label>location</label>
            <input class="form-control" type="text" placeholder="Enter location here" name="location" value="<?php echo $row['location']; ?>">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>address</label>
            <input class="form-control" type="text" placeholder="Enter text here" name="address" value="<?php echo $row['address']; ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>pin</label>
            <input class="form-control" type="number" placeholder="Enter pin here" name="pin" value="<?php echo $row['pin']; ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>contact_no</label>
            <input class="form-control" type="number" placeholder="Enter contact_no here" name="contact_no" value="<?php echo $row['contact_no']; ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>total_seat</label>
            <input type="number" class="form-control" name="total_seat" value="<?php echo $row['total_seat']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>booked</label>
            <input type="number" class="form-control" name="booked" value="<?php echo $row['booked']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>lastbooking_date</label>
            <input type="date" class="form-control" name="lastbooking_date" value="<?php echo $row['lastbooking_date']; ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>type1</label>
            <select class="form-control" name="type1">
                <option value="VIP" <?php echo ($row['type1'] == 'VIP') ? 'selected' : ''; ?>>VIP</option>
                <option value="DIAMOND" <?php echo ($row['type1'] == 'DIAMOND') ? 'selected' : ''; ?>>DIAMOND</option>
                <option value="GOLD" <?php echo ($row['type1'] == 'GOLD') ? 'selected' : ''; ?>>GOLD</option>
                <option value="SILVER" <?php echo ($row['type1'] == 'SILVER') ? 'selected' : ''; ?>>SILVER</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>seat1</label>
            <input class="form-control" type="number" name="seat1" value="<?php echo $row['seat1']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>booked1</label>
            <input class="form-control" type="number" name="booked1" value="<?php echo $row['booked1']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>type2</label>
            <select class="form-control" name="type2">
                <option value="VIP" <?php echo ($row['type2'] == 'VIP') ? 'selected' : ''; ?>>VIP</option>
                <option value="DIAMOND" <?php echo ($row['type2'] == 'DIAMOND') ? 'selected' : ''; ?>>DIAMOND</option>
                <option value="GOLD" <?php echo ($row['type2'] == 'GOLD') ? 'selected' : ''; ?>>GOLD</option>
                <option value="SILVER" <?php echo ($row['type2'] == 'SILVER') ? 'selected' : ''; ?>>SILVER</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>seat2</label>
            <input class="form-control" type="number" name="seat2" value="<?php echo $row['seat2']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>booked2</label>
            <input class="form-control" type="number" name="booked2" value="<?php echo $row['booked2']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>type3</label>
            <select class="form-control" name="type3">
                <option value="VIP" <?php echo ($row['type3'] == 'VIP') ? 'selected' : ''; ?>>VIP</option>
                <option value="DIAMOND" <?php echo ($row['type3'] == 'DIAMOND') ? 'selected' : ''; ?>>DIAMOND</option>
                <option value="GOLD" <?php echo ($row['type3'] == 'GOLD') ? 'selected' : ''; ?>>GOLD</option>
                <option value="SILVER" <?php echo ($row['type3'] == 'SILVER') ? 'selected' : ''; ?>>SILVER</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>seat3</label>
            <input class="form-control" type="number" name="seat3" value="<?php echo $row['seat3']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>booked3</label>
            <input class="form-control" type="number" name="booked3" value="<?php echo $row['booked3']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>type4</label>
            <select class="form-control" name="type4">
                <option value="VIP" <?php echo ($row['type4'] == 'VIP') ? 'selected' : ''; ?>>VIP</option>
                <option value="DIAMOND" <?php echo ($row['type4'] == 'DIAMOND') ? 'selected' : ''; ?>>DIAMOND</option>
                <option value="GOLD" <?php echo ($row['type4'] == 'GOLD') ? 'selected' : ''; ?>>GOLD</option>
                <option value="SILVER" <?php echo ($row['type4'] == 'SILVER') ? 'selected' : ''; ?>>SILVER</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>seat4</label>
            <input class="form-control" type="number" name="seat4" value="<?php echo $row['seat4']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>booked4</label>
            <input class="form-control" type="number" name="booked4" value="<?php echo $row['booked4']; ?>">
        </div>
    </div>
</div>
<div class="row"></div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Event Time</label>
            <input class="form-control" type="text" name="time" value="<?php echo $row['time']; ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Image</label>
            <input class="form-control" type="file" name="image">
            <?php if($row['image']!=''){ ?>
            <img src="<?php echo '../uploads/event_location/'.$row['image']; ?>" height="50" width="50"/>
            <?php } ?>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <label>Description</label>
            <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="description" id="description"><?php echo $row['description']; ?></textarea>
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
