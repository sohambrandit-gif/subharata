<?php include 'header.php';
if (!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] == '') {
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
                    <h3 class="page-title">Sample Audios</h3>
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
                        <form action="sample_audios_chk.php?id=1" method="post" enctype="multipart/form-data">
                            <?php


                            $sql12 = "SELECT * FROM sample_audios where sl_id=1";
                            $res = mysqli_query($conn, $sql12);
                            $row = mysqli_fetch_array($res);

                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input class="form-control" type="text" name="" value="Poems" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>sample_audio_a1_title</label>
                                        <input class="form-control" type="text" name="sample_audio_a1_title"
                                            value="<?php echo $row['sample_audio_a1_title']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sample Audio 1</label>
                                        <input class="form-control" type="file" name="sample_audio_a1">
                                        <?php if ($row['sample_audio_a1'] != '') { ?>
                                            <audio controls>
                                                <source
                                                    src="<?php echo '../uploads/sample_audios/' . $row['sample_audio_a1']; ?>"
                                                    type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>sample_audio_a2_title</label>
                                        <input class="form-control" type="text" name="sample_audio_a2_title"
                                            value="<?php echo $row['sample_audio_a2_title']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sample Audio 2</label>
                                        <input class="form-control" type="file" name="sample_audio_a2">
                                        <?php if ($row['sample_audio_a2'] != '') { ?>
                                            <audio controls>
                                                <source
                                                    src="<?php echo '../uploads/sample_audios/' . $row['sample_audio_a2']; ?>"
                                                    type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input class="form-control" type="text" name="" value="Storytelling" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>sample_audio_b1_title</label>
                                        <input class="form-control" type="text" name="sample_audio_b1_title"
                                            value="<?php echo $row['sample_audio_b1_title']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sample Audio 1</label>
                                        <input class="form-control" type="file" name="sample_audio_b1">
                                        <?php if ($row['sample_audio_b1'] != '') { ?>
                                            <audio controls>
                                                <source
                                                    src="<?php echo '../uploads/sample_audios/' . $row['sample_audio_b1']; ?>"
                                                    type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>sample_audio_b2_title</label>
                                        <input class="form-control" type="text" name="sample_audio_b2_title"
                                            value="<?php echo $row['sample_audio_b2_title']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sample Audio 2</label>
                                        <input class="form-control" type="file" name="sample_audio_b2">
                                        <?php if ($row['sample_audio_b2'] != '') { ?>
                                            <audio controls>
                                                <source
                                                    src="<?php echo '../uploads/sample_audios/' . $row['sample_audio_b2']; ?>"
                                                    type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input class="form-control" type="text" name="" value="Narration" readonly>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>sample_audio_c1_title</label>
                                        <input class="form-control" type="text" name="sample_audio_c1_title"
                                            value="<?php echo $row['sample_audio_c1_title']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sample Audio 1</label>
                                        <input class="form-control" type="file" name="sample_audio_c1">
                                        <?php if ($row['sample_audio_c1'] != '') { ?>
                                            <audio controls>
                                                <source
                                                    src="<?php echo '../uploads/sample_audios/' . $row['sample_audio_c1']; ?>"
                                                    type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>sample_audio_c2_title</label>
                                        <input class="form-control" type="text" name="sample_audio_c2_title"
                                            value="<?php echo $row['sample_audio_c2_title']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sample Audio 2</label>
                                        <input class="form-control" type="file" name="sample_audio_c2">
                                        <?php if ($row['sample_audio_c2'] != '') { ?>
                                            <audio controls>
                                                <source
                                                    src="<?php echo '../uploads/sample_audios/' . $row['sample_audio_c2']; ?>"
                                                    type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input class="form-control" type="text" name="" value="Commercials" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>sample_audio_d1_title</label>
                                        <input class="form-control" type="text" name="sample_audio_d1_title"
                                            value="<?php echo $row['sample_audio_d1_title']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sample Audio 1</label>
                                        <input class="form-control" type="file" name="sample_audio_d1">
                                        <?php if ($row['sample_audio_d1'] != '') { ?>
                                            <audio controls>
                                                <source
                                                    src="<?php echo '../uploads/sample_audios/' . $row['sample_audio_d1']; ?>"
                                                    type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>sample_audio_d2_title</label>
                                        <input class="form-control" type="text" name="sample_audio_d2_title"
                                            value="<?php echo $row['sample_audio_d2_title']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sample Audio 2</label>
                                        <input class="form-control" type="file" name="sample_audio_d2">
                                        <?php if ($row['sample_audio_d2'] != '') { ?>
                                            <audio controls>
                                                <source
                                                    src="<?php echo '../uploads/sample_audios/' . $row['sample_audio_d2']; ?>"
                                                    type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>sample_audio_d3_title</label>
                                        <input class="form-control" type="text" name="sample_audio_d3_title"
                                            value="<?php echo $row['sample_audio_d3_title']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sample Audio 3</label>
                                        <input class="form-control" type="file" name="sample_audio_d3">
                                        <?php if ($row['sample_audio_d3'] != '') { ?>
                                            <audio controls>
                                                <source
                                                    src="<?php echo '../uploads/sample_audios/' . $row['sample_audio_d3']; ?>"
                                                    type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>sample_audio_d4_title</label>
                                        <input class="form-control" type="text" name="sample_audio_d4_title"
                                            value="<?php echo $row['sample_audio_d4_title']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sample Audio 4</label>
                                        <input class="form-control" type="file" name="sample_audio_d4">
                                        <?php if ($row['sample_audio_d4'] != '') { ?>
                                            <audio controls>
                                                <source
                                                    src="<?php echo '../uploads/sample_audios/' . $row['sample_audio_d4']; ?>"
                                                    type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
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