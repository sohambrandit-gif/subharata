<?php include 'header.php'; ?>
<!-- Page Wrapper -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet" async>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js" defer="defer"></script>
    <script type="text/javascript" defer="defer">
    $(document).ready(function() {
      $('#description,#description1').summernote({
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
<div class="page-wrapper">
  <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="page-title">Flim Publicity Design</h3>
        </div>
      </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
      <div class="col-md-6" style="display:none">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Primary Information</h4>
          </div>
          <div class="card-body">
            <form action="banner_chk.php?id=4&page=branding" method="post" enctype="multipart/form-data">
              <?php $sql12 = "SELECT * FROM banner where sl_id=4";
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Banner Image</label>
                    <input class="form-control" type="file" name="image" >
                    <img src="<?php echo '../uploads/banner/'.$row['image']; ?>" height="50" width="100"/> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Seo Title</label>
                    <input type="text" class="form-control" name="seo_title"  value="<?php echo $row['seo_title']; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Seo Desc</label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="seo_description" ><?php echo $row['seo_description']; ?></textarea>
                  </div>
                </div>
                <div class="col-md-6">
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
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Header</h4>
          </div>
          <div class="card-body">
            <form action="about_chk.php?id=32&page=film_publicity_design" method="post" enctype="multipart/form-data">
              <?php $sql12 = "SELECT * FROM about where sl_id=32";
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			?>
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title"  value="<?php echo $row['title']; ?>">
              </div>
              <div class="form-group">
                <label>About Description</label>
                <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="description"><?php echo $row['description']; ?></textarea>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Content</h4>
          </div>
          <div class="card-body">
            <form action="about_chk.php?id=33&page=film_publicity_design" method="post" enctype="multipart/form-data">
              <?php $sql12 = "SELECT * FROM about where sl_id=33";
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			?>
			  
              <div class="form-group">
                <label>Image</label>
                <input class="form-control" type="file" name="image" >
                <img src="<?php echo '../uploads/other/'.$row['image']; ?>" style="width:25%"/>
			  </div>
			
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title"  value="<?php echo $row['title']; ?>">
              </div>
              <div class="form-group">
                <label>About Description</label>
                <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="description" id="description"><?php echo $row['description']; ?></textarea>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Content</h4>
          </div>
          <div class="card-body">
            <form action="about_chk.php?id=34&page=film_publicity_design" method="post" enctype="multipart/form-data">
              <?php $sql12 = "SELECT * FROM about where sl_id=34";
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			?>
			 <div class="form-group">
                <label>Image</label>
                <input class="form-control" type="file" name="image" >
                <img src="<?php echo '../uploads/other/'.$row['image']; ?>" style="width:25%"/>
			  </div>
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title"  value="<?php echo $row['title']; ?>">
              </div>
              <div class="form-group">
                <label>About Description</label>
                <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="description" id="description1"><?php echo $row['description']; ?></textarea>
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