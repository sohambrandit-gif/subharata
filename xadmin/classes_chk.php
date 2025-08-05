<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$title=mysqli_real_escape_string($conn,$_POST['title']);
$course_tag=mysqli_real_escape_string($conn,$_POST['course_tag']);
$duration=mysqli_real_escape_string($conn,$_POST['duration']);
$instructor=mysqli_real_escape_string($conn,$_POST['instructor']);
if($sl_id==''){
	$sql1 = "INSERT INTO classes (title, course_tag, duration, instructor) VALUES ('$title', '$course_tag', '$duration', '$instructor')";
	$res=mysqli_query($conn,$sql1);
	$sl_id=mysqli_insert_id($conn);
}else{
	$sql1 = "UPDATE classes SET title='$title', course_tag='$course_tag', duration='$duration', instructor='$instructor' WHERE sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if ($_FILES['instructor_img']['name']!='') {
			
	$tempFile = $_FILES['instructor_img']['tmp_name'];          //3             
	$targetPath = '../uploads/classes/'; 
	$ext = end((explode(".", $_FILES['instructor_img']['name'])));
	$file_name = 'classes'.date('ymdhis').'.'.$ext;
	$targetFile = $targetPath.$file_name;  //5
	move_uploaded_file($tempFile, $targetFile); //6
	$instructor_img = $file_name;
				
	$sql1 = "update classes set instructor_img='$instructor_img' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){
	header('location: classes.php?success');
}else{
	header('location: classes.php?error');
}
?>