<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$image=$_POST['image'];
if ($_FILES['image']['name']!='') {
			
	$tempFile = $_FILES['image']['tmp_name'];          //3             
	$targetPath = '../uploads/footer_logo/'; 
	$ext = end((explode(".", $_FILES['image']['name'])));
	$file_name = 'footer_logo'.date('ymdhis').'.'.$ext;
	$targetFile = $targetPath.$file_name;  //5
	move_uploaded_file($tempFile, $targetFile); //6
	$image = $file_name;
				
	$sql1 = "update footer_logo set image='$image' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){
	header('location: home.php?success');
}else{
	header('location: home.php?error');
}
?>