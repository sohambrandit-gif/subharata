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
                    <h3 class="page-title">Add Class Details</h3>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Class Details for <?php echo get_classes($_GET['class_id']); ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead>
                                    <tr>
                                        <th>#id</th>
                                        <th>class_id</th>
                                        <th>title</th>
                                        <th>age</th>
                                        <th>duration</th>
                                        <th>valid</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($_GET['class_id'] != '') {
                                        $sql12 = "SELECT * FROM class_details where class_id= " . $_GET['class_id'] . " order by sl_id desc ";
                                    } else {
                                        $sql12 = "SELECT * FROM class_details  order by sl_id desc ";
                                    }

                                    $res = mysqli_query($conn, $sql12);
                                    while ($row = mysqli_fetch_array($res)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['sl_id']; ?></td>
                                            <td><?php echo $row['class_id']; ?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['age']; ?></td>
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
                                                                href="classes_details_action.php?id=<?php echo $row['sl_id']; ?>&class_id=<?php echo $_GET['class_id']; ?>&action=Active">Set
                                                                Active</a>
                                                        <?php } else { ?>
                                                            <a class="dropdown-item"
                                                                href="classes_details_action.php?id=<?php echo $row['sl_id']; ?>&class_id=<?php echo $_GET['class_id']; ?>&action=Regular">Set
                                                                Block</a>
                                                        <?php } ?>


                                                        <a class="dropdown-item"
                                                            href="classes_details.php?sl_id=<?php echo $row['sl_id']; ?>&class_id=<?php echo $_GET['class_id']; ?>&#update">Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item"
                                                            href="classes_details_del.php?id=<?php echo $row['sl_id']; ?>&class_id=<?php echo $_GET['class_id']; ?>"
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
                        <h4 class="card-title">Add/Edit Class Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="classes_details_chk.php?id=<?php echo $_GET['sl_id']; ?>" method="post"
                            enctype="multipart/form-data">
                            <?php

                            if (isset($_GET['sl_id']) && $_GET['sl_id'] != '') {
                                $sql12 = "SELECT * FROM class_details where class_id= " . $_GET['class_id'] . " and sl_id=" . $_GET['sl_id'];
                                $res = mysqli_query($conn, $sql12);
                                $row = mysqli_fetch_array($res);
                            }

                            ?>
                            <input class="form-control" type="hidden" name="class_id"
                                value="<?php echo $_GET['class_id']; ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>title</label>
                                        <input class="form-control" type="text" placeholder="Enter text here"
                                            name="title" value="<?php echo $row['title']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input class="form-control" type="text" placeholder="Enter text here" name="age"
                                            value="<?php echo $row['age']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>duration</label>
                                        <input class="form-control" type="text" placeholder="Enter text here"
                                            name="duration" value="<?php echo $row['duration']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Language</label>
                                        <input class="form-control" type="text" placeholder="Enter text here"
                                            name="language" value="<?php echo $row['language']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input class="form-control" type="text" placeholder="Enter pin here"
                                            name="category" value="<?php echo $row['category']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here"
                                            name="description"
                                            id="description"><?php echo $row['description']; ?></textarea>
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