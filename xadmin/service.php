<?php include 'header.php'; ?>
<!-- Page Wrapper -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet" async>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js" defer="defer"></script>
    <script type="text/javascript" defer="defer">
    $(document).ready(function() {
      $('#description1,#description2').summernote({
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
		$('#description1,#description2').summernote("insertNode", image[0]);
      }
    });
  }
</script>
<div class="page-wrapper">
  <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="page-title">Services</h3>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Header</h4>
          </div>
          <div class="card-body">
            <form action="service_chk.php?id=<?php echo $_GET['id'];?>" method="post" enctype="multipart/form-data">
           
              <?php  $sql12 = "SELECT * FROM services where sl_id=".$_GET['id'];
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			?>
        

              <?php /*?><?php /*?><div class="form-group">
                <label>Image</label>
                <input class="form-control" type="file" name="image1" >
                <img src="<?php echo '../uploads/portfolio/'.$row['image1']; ?>" style="width:25%"/>
			  </div><?php */?>
			
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title1"  value="<?php echo $row['title1']; ?>">
              </div>
              <div class="form-group">
                <label>About Description</label>
                <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="description1" id="description1"><?php echo $row['description1']; ?></textarea>
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