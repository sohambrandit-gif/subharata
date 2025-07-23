<?php include "../global/connection.php"; ?>
<?php
$sl_id = $_GET['id'];
$event_id = $_GET['event_id'] ?? '';
$action = $_GET['action'];
if ($sl_id != '' && $action == 'Active') {
	$sql1 = "update artists set valid=1  where sl_id='$sl_id'";
} else if ($sl_id != '' && $action == 'Regular') {
	$sql1 = "update artists set valid=0  where sl_id='$sl_id'";
}
$res = mysqli_query($conn, $sql1);
if ($res) {
	header('location: event_artist.php?event_id=' . $event_id . '&success');
} else {
	header('location: event_artist.php?event_id=' . $event_id . '&success');
}
?>