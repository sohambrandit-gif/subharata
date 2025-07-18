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
          <h3 class="page-title">Add Blog</h3>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
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
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="blog_chk.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
              <?php  if(isset($_GET['id']) && $_GET['id']!=''){ 
             $sql12 = "SELECT * FROM blog where sl_id=".$_GET['id'];
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
              }
			?>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Main Image</label>
                    <input class="form-control" type="file" name="banner_image" >
                    <?php if($row['banner_image']!=''){ ?>
                    <img src="<?php echo '../uploads/blog/'.$row['banner_image']; ?>" height="50" width="100"/>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="boldtext" required value="<?php echo $row['boldtext']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Product Content</label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="description" id="description" required><?php echo $row['description']; ?></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Seo Title</label>
                    <input type="text" class="form-control" name="seo_title"  value="<?php echo $row['seo_title']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Seo Desc</label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="seo_description" ><?php echo $row['seo_description']; ?></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Seo Keywords</label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="(,) seperated" name="seo_tags"  ><?php echo $row['seo_tags']; ?></textarea>
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