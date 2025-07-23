<?php include "../global/connection.php"; ?>
<?php
// Get IDs from the request
$sl_id = $_GET['id'] ?? '';
$event_id = mysqli_real_escape_string($conn, $_POST['event_id']);
// Escape all artist data to prevent SQL injection
$artist1_name = mysqli_real_escape_string($conn, $_POST['artist1_name']);
$artist2_name = mysqli_real_escape_string($conn, $_POST['artist2_name']);
$artist3_name = mysqli_real_escape_string($conn, $_POST['artist3_name']);
$artist4_name = mysqli_real_escape_string($conn, $_POST['artist4_name']);
$artist5_name = mysqli_real_escape_string($conn, $_POST['artist5_name']);

if ($sl_id == '') {
    // Insert new record
    $sql = "INSERT INTO artists (
            event_id,
            artist1_name, 
            artist2_name, 
            artist3_name, 
            artist4_name, 
            artist5_name
        ) VALUES (
            '$event_id',
            '$artist1_name',
            '$artist2_name',
            '$artist3_name',
            '$artist4_name',
            '$artist5_name'
        )";
} else {
    // Update existing record
    $sql = "UPDATE artists SET
            artist1_name = '$artist1_name',
            artist2_name = '$artist2_name',
            artist3_name = '$artist3_name',
            artist4_name = '$artist4_name',
            artist5_name = '$artist5_name'
            WHERE sl_id = '$sl_id'";
}

// Execute the main query
$res = mysqli_query($conn, $sql);

// Handle image uploads for each artist
// Artist 1 (original code)
if (isset($_FILES['artist1_img']) && $_FILES['artist1_img']['name'] != '') {
    $tempFile = $_FILES['artist1_img']['tmp_name'];
    $targetPath = '../uploads/events/artist_img/';
    $ext = pathinfo($_FILES['artist1_img']['name'], PATHINFO_EXTENSION);
    $file_name = 'artist_' . date('ymdhis') . '_1.' . $ext; // Added _1 for artist 1
    $targetFile = $targetPath . $file_name;

    if (move_uploaded_file($tempFile, $targetFile)) {
        $artist1_img = $file_name;
        $update_sql = "UPDATE artists SET artist1_img = '$artist1_img' WHERE sl_id = " . ($sl_id ? $sl_id : mysqli_insert_id($conn));
        mysqli_query($conn, $update_sql);
    }
}

// Artist 2
if (isset($_FILES['artist2_img']) && $_FILES['artist2_img']['name'] != '') {
    $tempFile = $_FILES['artist2_img']['tmp_name'];
    $targetPath = '../uploads/events/artist_img/';
    $ext = pathinfo($_FILES['artist2_img']['name'], PATHINFO_EXTENSION);
    $file_name = 'artist_' . date('ymdhis') . '_2.' . $ext; // Added _2 for artist 2
    $targetFile = $targetPath . $file_name;

    if (move_uploaded_file($tempFile, $targetFile)) {
        $artist2_img = $file_name;
        $update_sql = "UPDATE artists SET artist2_img = '$artist2_img' WHERE sl_id = " . ($sl_id ? $sl_id : mysqli_insert_id($conn));
        mysqli_query($conn, $update_sql);
    }
}

// Artist 3
if (isset($_FILES['artist3_img']) && $_FILES['artist3_img']['name'] != '') {
    $tempFile = $_FILES['artist3_img']['tmp_name'];
    $targetPath = '../uploads/events/artist_img/';
    $ext = pathinfo($_FILES['artist3_img']['name'], PATHINFO_EXTENSION);
    $file_name = 'artist_' . date('ymdhis') . '_3.' . $ext; // Added _3 for artist 3
    $targetFile = $targetPath . $file_name;

    if (move_uploaded_file($tempFile, $targetFile)) {
        $artist3_img = $file_name;
        $update_sql = "UPDATE artists SET artist3_img = '$artist3_img' WHERE sl_id = " . ($sl_id ? $sl_id : mysqli_insert_id($conn));
        mysqli_query($conn, $update_sql);
    }
}

// Artist 4
if (isset($_FILES['artist4_img']) && $_FILES['artist4_img']['name'] != '') {
    $tempFile = $_FILES['artist4_img']['tmp_name'];
    $targetPath = '../uploads/events/artist_img/';
    $ext = pathinfo($_FILES['artist4_img']['name'], PATHINFO_EXTENSION);
    $file_name = 'artist_' . date('ymdhis') . '_4.' . $ext; // Added _4 for artist 4
    $targetFile = $targetPath . $file_name;

    if (move_uploaded_file($tempFile, $targetFile)) {
        $artist4_img = $file_name;
        $update_sql = "UPDATE artists SET artist4_img = '$artist4_img' WHERE sl_id = " . ($sl_id ? $sl_id : mysqli_insert_id($conn));
        mysqli_query($conn, $update_sql);
    }
}

// Artist 5
if (isset($_FILES['artist5_img']) && $_FILES['artist5_img']['name'] != '') {
    $tempFile = $_FILES['artist5_img']['tmp_name'];
    $targetPath = '../uploads/events/artist_img/';
    $ext = pathinfo($_FILES['artist5_img']['name'], PATHINFO_EXTENSION);
    $file_name = 'artist_' . date('ymdhis') . '_5.' . $ext; // Added _5 for artist 5
    $targetFile = $targetPath . $file_name;

    if (move_uploaded_file($tempFile, $targetFile)) {
        $artist5_img = $file_name;
        $update_sql = "UPDATE artists SET artist5_img = '$artist5_img' WHERE sl_id = " . ($sl_id ? $sl_id : mysqli_insert_id($conn));
        mysqli_query($conn, $update_sql);
    }
}

if ($res) {
   header('location: event_artist.php?&event_id='.$event_id.'&success');
} else {
   header('location: event_artist.php?&event_id='.$event_id.'&error');
}
?>