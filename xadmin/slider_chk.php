<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$image=$_POST['image'];
$title=mysqli_real_escape_string($conn,$_POST['title']);
$description=mysqli_real_escape_string($conn,$_POST['description']);
$link=mysqli_real_escape_string($conn,$_POST['link']);

if ($_FILES['image']['name']!='') {
			
	$tempFile = $_FILES['image']['tmp_name'];          //3             
	$targetPath = '../uploads/slider/'; 
	$ext = end((explode(".", $_FILES['image']['name'])));
	$file_name = 'slider'.date('ymdhis').'.'.$ext;
	$targetFile = $targetPath.$file_name;  //5
	move_uploaded_file($tempFile, $targetFile); //6
	$image = $file_name;
				
	$sql1 = "update slider set image='$image' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if ($_FILES['mobile_image']['name']!='') {
			
	$tempFile = $_FILES['mobile_image']['tmp_name'];          //3             
	$targetPath = '../uploads/slider/'; 
	$ext = end((explode(".", $_FILES['mobile_image']['name'])));
	$file_name = 'slider'.date('ymdhis').'.'.$ext;
	$targetFile = $targetPath.$file_name;  //5
	move_uploaded_file($tempFile, $targetFile); //6
	$image = $file_name;
				
	$sql1 = "update slider set mobile_image='$image' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
			
$sql1 = "update slider set title='$title',description='$description',link='$link'  where sl_id='$sl_id'";
$res=mysqli_query($conn,$sql1);
if($res){
	header('location: home.php?success');
}else{
	header('location: home.php?error');
}
?>
