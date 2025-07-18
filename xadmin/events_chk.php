<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$title=mysqli_real_escape_string($conn,$_POST['title']);
$description=mysqli_real_escape_string($conn,$_POST['description']);
$duration=mysqli_real_escape_string($conn,$_POST['duration']);
$start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
$end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
$artist_info = mysqli_real_escape_string($conn, $_POST['artist_info']);
$position=mysqli_real_escape_string($conn,$_POST['position']);
if($sl_id==''){
	$sql1 = "INSERT INTO events (title, description, start_date, end_date, artist_info,position) VALUES ('$title', '$description', '$start_date', '$end_date', '$artist_info','$position')";
	$res=mysqli_query($conn,$sql1);
	$sl_id=mysqli_insert_id($conn);
}else{
	$sql1 = "UPDATE events SET title='$title',description='$description',start_date='$start_date',end_date='$end_date',artist_info='$artist_info',position='$position' WHERE sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if ($_FILES['image']['name']!='') {
			
	$tempFile = $_FILES['image']['tmp_name'];          //3             
	$targetPath = '../uploads/events/'; 
	$ext = end((explode(".", $_FILES['image']['name'])));
	$file_name = 'events'.date('ymdhis').'.'.$ext;
	$targetFile = $targetPath.$file_name;  //5
	move_uploaded_file($tempFile, $targetFile); //6
	$image = $file_name;
				
	$sql1 = "update events set image='$image' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){
	header('location: events.php?success');
}else{
	header('location: events.php?error');
}
?>