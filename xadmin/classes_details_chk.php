<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$class_id = mysqli_real_escape_string($conn, $_POST['class_id']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$age= mysqli_real_escape_string($conn, $_POST['age']);
$duration=mysqli_real_escape_string($conn, $_POST['duration']);
$language = mysqli_real_escape_string($conn, $_POST['language']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
if($sl_id==''){
	$sql1 = "INSERT INTO class_details (class_id, title, age, duration, language, description, category) VALUES ('$class_id', '$title', '$age', '$duration', '$language', '$description', '$category')";
	$res=mysqli_query($conn,$sql1);
	$sl_id=mysqli_insert_id($conn);
}else{
	$sql1 = "UPDATE class_details SET class_id='$class_id', title='$title', age='$age', duration='$duration', language='$language', description='$description', category='$category' WHERE sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}

if($res){
	header('location: classes_details.php?class_id=' . $class_id . '&success');
}else{
	header('location: classes_details.php?class_id=' . $class_id . '&error');
}
?>