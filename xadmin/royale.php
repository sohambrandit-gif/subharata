<?php include 'header.php'; ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
  <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="page-title">Home Page</h3>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
      
	  
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Banner One</h4>
          </div>
          <div class="card-body">
            <form action="slider_chk.php?id=1" method="post" enctype="multipart/form-data">
              <?php $sql12 = "SELECT * FROM slider where sl_id=1";
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			?>
              <div class="form-group">
                <label>Banner Image</label>
                <input class="form-control" type="file" name="image" >
                <img src="<?php echo '../uploads/slider/'.$row['image']; ?>" style="width:100%;"/> </div>
              <div class="form-group" style="display:none;">
                <label>Mobile Banner Image 483 x 615 px</label>
                <input class="form-control" type="file" name="mobile_image" >
                <img src="<?php echo '../uploads/slider/'.$row['mobile_image']; ?>" height="100" width="50"/> </div>
                             <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title"  value="<?php echo $row['title']; ?>">
                  </div>
            
                  <div class="form-group">
                    <label>Sub Text</label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="" name="description" ><?php echo $row['description']; ?></textarea>
                  </div>
              
                  <div class="form-group">
                    <label>Link</label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="" name="link"  ><?php echo $row['link']; ?></textarea>
                  </div>

              <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Banner Two</h4>
          </div>
          <div class="card-body">
            <form action="slider_chk.php?id=2" method="post" enctype="multipart/form-data">
              <?php $sql12 = "SELECT * FROM slider where sl_id=2";
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			?>
              <div class="form-group">
                <label>Banner Image 1394 x635 px</label>
                <input class="form-control" type="file" name="image">
                <img src="<?php echo '../uploads/slider/'.$row['image']; ?>" style="width:100%;"/> </div>
              <div class="form-group" style="display:none;">
                <label>Mobile Banner Image 483 x 615 px</label>
                <input class="form-control" type="file" name="mobile_image" >
                <img src="<?php echo '../uploads/slider/'.$row['mobile_image']; ?>" height="100" width="50"/> </div>
               <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title"  value="<?php echo $row['title']; ?>">
                  </div>
            
                  <div class="form-group">
                    <label>Sub Text</label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="" name="description" ><?php echo $row['description']; ?></textarea>
                  </div>
              
                  <div class="form-group">
                    <label>Link</label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="" name="link"  ><?php echo $row['link']; ?></textarea>
                  </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Banner Three</h4>
          </div>
          <div class="card-body">
            <form action="slider_chk.php?id=3" method="post" enctype="multipart/form-data">
              <?php $sql12 = "SELECT * FROM slider where sl_id=3";
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			?>
              <div class="form-group">
                <label>Banner Image 1394 x635 px</label>
                <input class="form-control" type="file" name="image" >
                <img src="<?php echo '../uploads/slider/'.$row['image']; ?>" style="width:100%"/> </div>
              <div class="form-group" style="display:none;">
                <label>Mobile Banner Image 483 x 615 px</label>
                <input class="form-control" type="file" name="mobile_image" >
                <img src="<?php echo '../uploads/slider/'.$row['mobile_image']; ?>" style="width:100%"/> </div>
				
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title"  value="<?php echo $row['title']; ?>">
                  </div>
            
                  <div class="form-group">
                    <label>Sub Text</label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="" name="description" ><?php echo $row['description']; ?></textarea>
                  </div>
              
                  <div class="form-group">
                    <label>Link</label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="" name="link"  ><?php echo $row['link']; ?></textarea>
                  </div>
                
              </div>
				
              <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>

	 
<?php include 'footer.php'; ?>