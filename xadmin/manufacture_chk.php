<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$name=mysqli_real_escape_string($conn,$_POST['name']);
$position=mysqli_real_escape_string($conn,$_POST['position']);
$ship_rocket=mysqli_real_escape_string($conn,$_POST['ship_rocket']);
if($sl_id==''){
	$sql1 = "insert into manufacture (name,position,ship_rocket) values('$name','$position','$ship_rocket')";
	$res=mysqli_query($conn,$sql1);
	$sl_id=mysqli_insert_id($conn);
}else{
	$sql1 = "update manufacture set name='$name',position='$position',ship_rocket='$ship_rocket' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if ($_FILES['banner_image']['name']!='') {
			
	$tempFile = $_FILES['banner_image']['tmp_name'];          //3             
	$targetPath = '../uploads/manufacture/'; 
	$ext = end((explode(".", $_FILES['banner_image']['name'])));
	$file_name = 'cat'.date('ymdhis').'.'.$ext;
	$targetFile = $targetPath.$file_name;  //5
	move_uploaded_file($tempFile, $targetFile); //6
	$image = $file_name;
				
	$sql1 = "update manufacture set image='$image' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){
	header('location: manufacture.php?success');
}else{
	header('location: manufacture.php?error');
}
?>