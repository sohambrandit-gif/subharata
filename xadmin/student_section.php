<?php include 'header.php';
if (!isset($_SESSION['login']) || $_SESSION['login'] == '') {
  redir('login.php');
} ?>
<!-- Datatables CSS -->
<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
<!-- Page Wrapper -->
<div class="page-wrapper">
  <div class="content container-fluid">
    <!-- Page Header -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet" async>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js" defer="defer"></script>
    <script type="text/javascript" defer="defer">
      $(document).ready(function () {
        $('#description').summernote({
          height: 300,
          tabsize: 2,
          followingToolbar: true,
          callbacks: {
            onImageUpload: function (files) {
              sendFile(files[0]);
            }
          }
        });
      });
    </script>
    <script type="text/javascript">
      function sendFile(file) {
        alert('Image uploading under process, may take some time.');
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
          <h3 class="page-title">Student Section</h3>
        </div>
      </div>
    </div>
    

    <div class="row" id="update">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Edit</h4>
          </div>
          <div class="card-body">
            <form action="student_section_chk.php?id=1" method="post" enctype="multipart/form-data">
              <?php

              
                $sql12 = "SELECT * FROM student_section where sl_id=1";
                $res = mysqli_query($conn, $sql12);
                $row = mysqli_fetch_array($res);
              
              ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" type="text" name="title" value="<?php echo $row['title']; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Image</label>
                    <input class="form-control" type="file" name="image">
                    <?php if ($row['image'] != '') { ?>
                      <img src="<?php echo '../uploads/student_section/' . $row['image']; ?>" height="50" width="50" />
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Duration</label>
                    <input class="form-control" type="text" name="duration" value="<?php echo $row['duration']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Sample Audio A</label>
                    <input class="form-control" type="file" name="sample_a_audio">
                    <?php if ($row['sample_a_audio'] != '') { ?>
                      <audio controls>
                        <source src="<?php echo '../uploads/student_section/sample_audio/' . $row['sample_a_audio']; ?>"
                          type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Sample Audio B</label>
                    <input class="form-control" type="file" name="sample_b_audio">
                    <?php if ($row['sample_b_audio'] != '') { ?>
                      <audio controls>
                        <source src="<?php echo '../uploads/student_section/sample_audio/' . $row['sample_b_audio']; ?>"
                          type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Sample Audio C</label>
                    <input class="form-control" type="file" name="sample_c_audio">
                    <?php if ($row['sample_c_audio'] != '') { ?>
                      <audio controls>
                        <source src="<?php echo '../uploads/student_section/sample_audio/' . $row['sample_c_audio']; ?>"
                          type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Sample Audio D</label>
                    <input class="form-control" type="file" name="sample_d_audio">
                    <?php if ($row['sample_d_audio'] != '') { ?>
                      <audio controls>
                        <source src="<?php echo '../uploads/student_section/sample_audio/' . $row['sample_d_audio']; ?>"
                          type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Category</label>
                    <input class="form-control" type="text" name="" value="A" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Class A Audio 1</label>
                    <input class="form-control" type="file" name="class_a1_audio">
                    <?php if ($row['class_a1_audio'] != '') { ?>
                      <audio controls>
                        <source src="<?php echo '../uploads/student_section/class_audio/' . $row['class_a1_audio']; ?>"
                          type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Class A Audio 2</label>
                    <input class="form-control" type="file" name="class_a2_audio">
                    <?php if ($row['class_a2_audio'] != '') { ?>
                      <audio controls>
                        <source src="<?php echo '../uploads/student_section/class_audio/' . $row['class_a2_audio']; ?>"
                          type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Class A PDF</label>
                    <input class="form-control" type="file" name="class_a_pdf">
                    <?php if ($row['class_a_pdf'] != '') { ?>
                      <iframe src="<?php echo '../uploads/student_section/class_pdf/' . $row['class_a_pdf']; ?>" width="100%"
                        height="200px"></iframe>
                    <?php } ?>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>Category</label>
                    <input class="form-control" type="text" name="" value="B" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Class B Audio 1</label>
                    <input class="form-control" type="file" name="class_b1_audio">
                    <?php if ($row['class_b1_audio'] != '') { ?>
                      <audio controls>
                        <source src="<?php echo '../uploads/student_section/class_audio/' . $row['class_b1_audio']; ?>"
                          type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Class B Audio 2</label>
                    <input class="form-control" type="file" name="class_b2_audio">
                    <?php if ($row['class_b2_audio'] != '') { ?>
                      <audio controls>
                        <source src="<?php echo '../uploads/student_section/class_audio/' . $row['class_b2_audio']; ?>"
                          type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Class B PDF</label>
                    <input class="form-control" type="file" name="class_b_pdf">
                    <?php if ($row['class_b_pdf'] != '') { ?>
                      <iframe src="<?php echo '../uploads/student_section/class_pdf/' . $row['class_b_pdf']; ?>" width="100%"
                        height="200px"></iframe>
                    <?php } ?>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>Category</label>
                    <input class="form-control" type="text" name="" value="C" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Class C Audio 1</label>
                    <input class="form-control" type="file" name="class_c1_audio">
                    <?php if ($row['class_c1_audio'] != '') { ?>
                      <audio controls>
                        <source src="<?php echo '../uploads/student_section/class_audio/' . $row['class_c1_audio']; ?>"
                          type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Class C Audio 2</label>
                    <input class="form-control" type="file" name="class_c2_audio">
                    <?php if ($row['class_c2_audio'] != '') { ?>
                      <audio controls>
                        <source src="<?php echo '../uploads/student_section/class_audio/' . $row['class_c2_audio']; ?>"
                          type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Class C PDF</label>
                    <input class="form-control" type="file" name="class_c_pdf">
                    <?php if ($row['class_c_pdf'] != '') { ?>
                      <iframe src="<?php echo '../uploads/student_section/class_pdf/' . $row['class_c_pdf']; ?>" width="100%"
                        height="200px"></iframe>
                    <?php } ?>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>Category</label>
                    <input class="form-control" type="text" name="" value="D" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Class D Audio 1</label>
                    <input class="form-control" type="file" name="class_d1_audio">
                    <?php if ($row['class_d1_audio'] != '') { ?>
                      <audio controls>
                        <source src="<?php echo '../uploads/student_section/class_audio/' . $row['class_d1_audio']; ?>"
                          type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Class D Audio 2</label>
                    <input class="form-control" type="file" name="class_d2_audio">
                    <?php if ($row['class_d2_audio'] != '') { ?>
                      <audio controls>
                        <source src="<?php echo '../uploads/student_section/class_audio/' . $row['class_d2_audio']; ?>"
                          type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Class D PDF</label>
                    <input class="form-control" type="file" name="class_d_pdf">
                    <?php if ($row['class_d_pdf'] != '') { ?>
                      <iframe src="<?php echo '../uploads/student_section/class_pdf/' . $row['class_d_pdf']; ?>" width="100%"
                        height="200px"></iframe>
                    <?php } ?>
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
<script>

</script>
<?php include 'footer.php'; ?>