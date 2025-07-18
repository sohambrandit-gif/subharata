<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$name=mysqli_real_escape_string($conn,$_POST['name']);
$testimonial=mysqli_real_escape_string($conn,$_POST['testimonial']);
$deg=mysqli_real_escape_string($conn,$_POST['deg']);
			
if($sl_id==''){
	$sql1 = "insert into testimonial (name,deg,testimonial) values('$name','$deg','$testimonial')";
	$res=mysqli_query($conn,$sql1);
	$sl_id=mysqli_insert_id($conn);
}else{
	$sql1 = "update testimonial set name='$name',deg='$deg',testimonial='$testimonial'   where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if ($_FILES['banner_image']['name']!='') {
			
	$tempFile = $_FILES['banner_image']['tmp_name'];          //3             
	$targetPath = '../uploads/testimonial/'; 
	$ext = end((explode(".", $_FILES['banner_image']['name'])));
	$file_name = 'testimonial'.date('ymdhis').'.'.$ext;
	$targetFile = $targetPath.$file_name;  //5
	move_uploaded_file($tempFile, $targetFile); //6
	$image = $file_name;
				
	$sql1 = "update testimonial set image='$image' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){
	header('location: testimonial.php?success');
}else{
	header('location: testimonial.php?error');
}
?>
