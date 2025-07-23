<?php include "../global/connection.php"; ?>
<?php
// Handle main event data
$sl_id = $_GET['id'] ?? '';
$event_id = mysqli_real_escape_string($conn, $_POST['event_id']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$time = mysqli_real_escape_string($conn, $_POST['time']);
$total_seat = mysqli_real_escape_string($conn, $_POST['total_seat']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$pin = mysqli_real_escape_string($conn, $_POST['pin']);
$contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$addressiframe = mysqli_real_escape_string($conn, $_POST['addressiframe']);
$language = mysqli_real_escape_string($conn, $_POST['language']);
$category = mysqli_real_escape_string($conn, $_POST['category']);


// Seat type data
$type1 = mysqli_real_escape_string($conn, $_POST['type1']);
$seat1 = mysqli_real_escape_string($conn, $_POST['seat1']);
$booked1 = mysqli_real_escape_string($conn, $_POST['booked1']);

$type2 = mysqli_real_escape_string($conn, $_POST['type2']);
$seat2 = mysqli_real_escape_string($conn, $_POST['seat2']);
$booked2 = mysqli_real_escape_string($conn, $_POST['booked2']);

$type3 = mysqli_real_escape_string($conn, $_POST['type3']);
$seat3 = mysqli_real_escape_string($conn, $_POST['seat3']);
$booked3 = mysqli_real_escape_string($conn, $_POST['booked3']);

$type4 = mysqli_real_escape_string($conn, $_POST['type4']);
$seat4 = mysqli_real_escape_string($conn, $_POST['seat4']);
$booked4 = mysqli_real_escape_string($conn, $_POST['booked4']);

$type5 = mysqli_real_escape_string($conn, $_POST['type5']);
$seat5 = mysqli_real_escape_string($conn, $_POST['seat5']);
$booked5 = mysqli_real_escape_string($conn, $_POST['booked5']);

$lastbooking_date = mysqli_real_escape_string($conn, $_POST['lastbooking_date'] ?? '');

if ($sl_id == '') {
    // Insert new event
     $sql = "INSERT INTO event_location (
            event_id, date, time, total_seat, location, address,addressiframe, pin, contact_no,language,category,
            type1, seat1, booked1,
            type2, seat2, booked2,
            type3, seat3, booked3,
            type4, seat4, booked4,
            type5, seat5, booked5,
            lastbooking_date, description
        ) VALUES (
            '$event_id', '$date', '$time', '$total_seat', '$location', '$address','$addressiframe', '$pin', '$contact_no','$language','$category',
            '$type1', '$seat1', '$booked1',
            '$type2', '$seat2', '$booked2',
            '$type3', '$seat3', '$booked3',
            '$type4', '$seat4', '$booked4',
            '$type5', '$seat5', '$booked5',
            '$lastbooking_date', '$description'
        )";
} else {
    // Update existing event
    $sql = "UPDATE event_location SET
          
            date = '$date',
            time = '$time',
            total_seat = '$total_seat',
            location = '$location',
            address = '$address',
            addressiframe = '$addressiframe',
            pin = '$pin',
            contact_no = '$contact_no',
            language='$language',
            category='$category',
            type1 = '$type1',
            seat1 = '$seat1',
            booked1 = '$booked1',
            type2 = '$type2',
            seat2 ='$seat2',
            booked2 = '$booked2',
            type3 = '$type3',
            seat3 = '$seat3',
            booked3 = '$booked3',
            type4 = '$type4',
            seat4 = '$seat4',
            booked4 = '$booked4',
            type5 = '$type5',
            seat5 = '$seat5',
            booked5 = '$booked5',
            lastbooking_date = '$lastbooking_date',
            description = '$description'
        WHERE sl_id = $sl_id";
}

$res = mysqli_query($conn, $sql);

// Handle image upload
if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
    $tempFile = $_FILES['image']['tmp_name'];
    $targetPath = '../uploads/event_location/';
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $file_name = 'event_' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;

    if (move_uploaded_file($tempFile, $targetFile)) {
        $image = $file_name;
        $update_sql = "UPDATE event_location SET image = '$image' WHERE sl_id = " . ($sl_id ? $sl_id : mysqli_insert_id($conn));
        mysqli_query($conn, $update_sql);
    }
}

if ($res) {
    header('location: event_location.php?event_id=' . $event_id . '&success');
} else {
    header('location: event_location.php?event_id=' . $event_id . '&error=' . urlencode(mysqli_error($conn)));
}
?>