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
                    <h3 class="page-title">Artists</h3>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Artists <?php echo get_event($_GET['event_id']); ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead>
                                    <tr>
                                        <th>#id</th>
                                        <th>event_id</th>
                                        <th>artist1_name</th>
                                        <th>artist2_name</th>
                                        <th>valid</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($_GET['event_id'] != '') {
                                        $sql12 = "SELECT * FROM artists where event_id= " . $_GET['event_id'] . " order by sl_id desc ";
                                    } else {
                                        $sql12 = "SELECT * FROM artists  order by sl_id desc ";
                                    }

                                    $res = mysqli_query($conn, $sql12);
                                    while ($row = mysqli_fetch_array($res)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['sl_id']; ?></td>
                                            <td><?php echo $row['event_id']; ?></td>
                                            <td><?php echo $row['artist1_name']; ?></td>
                                            <td><?php echo $row['artist2_name']; ?></td>
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
                                                                href="event_artist_action.php?id=<?php echo $row['sl_id']; ?>&event_id=<?php echo $_GET['event_id']; ?>&action=Active">Set
                                                                Active</a>
                                                        <?php } else { ?>
                                                            <a class="dropdown-item"
                                                                href="event_artist_action.php?id=<?php echo $row['sl_id']; ?>&event_id=<?php echo $_GET['event_id']; ?>&action=Regular">Set
                                                                Block</a>
                                                        <?php } ?>


                                                        <a class="dropdown-item"
                                                            href="event_artist.php?sl_id=<?php echo $row['sl_id']; ?>&event_id=<?php echo $_GET['event_id']; ?>&#update">Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item"
                                                            href="event_artist_del.php?id=<?php echo $row['sl_id']; ?>&event_id=<?php echo $_GET['event_id']; ?>"
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
                        <h4 class="card-title">Add/Edit artists</h4>
                    </div>
                    <div class="card-body">
                        <form action="event_artist_chk.php?id=<?php echo $_GET['sl_id']; ?>" method="post"
                            enctype="multipart/form-data">
                            <?php

                            if (isset($_GET['sl_id']) && $_GET['sl_id'] != '') {
                                $sql12 = "SELECT * FROM artists where sl_id=" . $_GET['sl_id'];
                                $res = mysqli_query($conn, $sql12);
                                $row = mysqli_fetch_array($res);
                            }
                            ?>
                            <input class="form-control" type="hidden" name="event_id"
                                value="<?php echo $_GET['event_id']; ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Artist Name</label>
                                        <input class="form-control" type="text" name="artist1_name"
                                            value="<?php echo $row['artist1_name']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Artist Image</label>
                                        <input class="form-control" type="file" name="artist1_img">
                                        <?php if ($row['artist1_img'] != '') { ?>
                                            <img src="<?php echo '../uploads/events/artist_img/' . $row['artist1_img']; ?>"
                                                height="50" width="50" />
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Artist 2 Name</label>
                                        <input class="form-control" type="text" name="artist2_name"
                                            value="<?php echo $row['artist2_name']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Artist 2 Image</label>
                                        <input class="form-control" type="file" name="artist2_img">
                                        <?php if ($row['artist2_img'] != '') { ?>
                                            <img src="<?php echo '../uploads/events/artist_img' . $row['artist2_img']; ?>"
                                                height="50" width="50" />
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Artist 3 Name</label>
                                        <input class="form-control" type="text" name="artist3_name"
                                            value="<?php echo $row['artist3_name']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Artist 3 Image</label>
                                        <input class="form-control" type="file" name="artist3_img">
                                        <?php if ($row['artist3_img'] != '') { ?>
                                            <img src="<?php echo '../uploads/events/artist_img' . $row['artist3_img']; ?>"
                                                height="50" width="50" />
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Artist 4 Name</label>
                                        <input class="form-control" type="text" name="artist4_name"
                                            value="<?php echo $row['artist4_name']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Artist 4 Image</label>
                                        <input class="form-control" type="file" name="artist4_img">
                                        <?php if ($row['artist4_img'] != '') { ?>
                                            <img src="<?php echo '../uploads/events/artist_img' . $row['artist4_img']; ?>"
                                                height="50" width="50" />
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Artist 5 Name</label>
                                        <input class="form-control" type="text" name="artist5_name"
                                            value="<?php echo $row['artist5_name']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Artist 5 Image</label>
                                        <input class="form-control" type="file" name="artist5_img">
                                        <?php if ($row['artist5_img'] != '') { ?>
                                            <img src="<?php echo '../uploads/events/artist_img' . $row['artist5_img']; ?>"
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