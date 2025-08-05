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
                    <h3 class="page-title">Classes</h3>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Classes</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead>
                                    <tr>
                                        <th>#id</th>
                                        <th>title</th>
                                        <th>course tag</th>
                                        <th>duration</th>
                                        <th>valid</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sql12 = "SELECT * FROM classes order by sl_id";
                                    $res = mysqli_query($conn, $sql12);
                                    while ($row = mysqli_fetch_array($res)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['sl_id']; ?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['course_tag']; ?></td>
                                            <td><?php echo $row['duration']; ?></td>
                                            <td><?php if ($row['valid'] == 0) {
                                                echo "Block";
                                            } else {
                                                echo "Active";
                                            } ?>
                                                <?php if ($row['featured'] == 0) {
                                                    echo "";
                                                } else {
                                                    echo "Featured";
                                                } ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">Action</button>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                                        <?php if ($row['valid'] == 0) { ?>
                                                            <a class="dropdown-item"
                                                                href="classes_action.php?id=<?php echo $row['sl_id']; ?>&action=Active">Set
                                                                Active</a>
                                                        <?php } else { ?>
                                                            <a class="dropdown-item"
                                                                href="classes_action.php?id=<?php echo $row['sl_id']; ?>&action=Regular">Set
                                                                Block</a>
                                                        <?php } ?>
                                                        <a class="dropdown-item"
                                                            href="classes.php?sl_id=<?php echo $row['sl_id']; ?>&#update">Edit</a>
                                                        <a class="dropdown-item"
                                                            href="classes_details.php?class_id=<?php echo $row['sl_id']; ?>#update">Add
                                                            Classes Details</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item"
                                                            href="classes_del.php?id=<?php echo $row['sl_id']; ?>"
                                                            onclick="return confirm('Do you want to delete the item?')">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
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
                        <h4 class="card-title">Add Classes</h4>
                    </div>
                    <div class="card-body">
                        <form action="classes_chk.php?id=<?php echo $_GET['sl_id']; ?>" method="post"
                            enctype="multipart/form-data">
                            <?php

                            if (isset($_GET['sl_id']) && $_GET['sl_id'] != '') {
                                $sql12 = "SELECT * FROM classes where sl_id=" . $_GET['sl_id'];
                                $res = mysqli_query($conn, $sql12);
                                $row = mysqli_fetch_array($res);
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" type="text" name="title"
                                            value="<?php echo $row['title']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>course_tag</label>
                                        <input class="form-control" type="text" name="course_tag"
                                            value="<?php echo $row['course_tag']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>duration</label>
                                        <input class="form-control" type="text" name="duration"
                                            value="<?php echo $row['duration']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>instructor</label>
                                        <input class="form-control" type="text" name="instructor"
                                            value="<?php echo $row['instructor']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Instructor Image (690 x 690 px)</label>
                                        <input class="form-control" type="file" name="instructor_img">
                                        <?php if ($row['instructor_img'] != '') { ?>
                                            <img src="<?php echo '../uploads/classes/' . $row['instructor_img']; ?>"
                                                height="50" width="50" />
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
<?php include 'footer.php'; ?>