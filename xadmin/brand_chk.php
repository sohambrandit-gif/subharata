<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$page=$_GET['page'];
$image=$_POST['image'];
$title=mysqli_real_escape_string($conn,$_POST['title']);
$description=mysqli_real_escape_string($conn,$_POST['description']);
if($sl_id==''){
	$sql1 = "insert into brand (title,description,image) values('$title','$description','')";
	$res=mysqli_query($conn,$sql1);
	$sl_id=mysqli_insert_id($conn);
}else{
$sql1 = "update brand set title='$title',description='$description'  where sl_id='$sl_id'";
$res=mysqli_query($conn,$sql1);
}
if ($_FILES['image']['name']!='') {
			
	$tempFile = $_FILES['image']['tmp_name'];          //3             
	$targetPath = '../uploads/brand/'; 
	$ext = end((explode(".", $_FILES['image']['name'])));
	$file_name = 'brand'.date('ymdhis').'.'.$ext;
	$targetFile = $targetPath.$file_name;  //5
	move_uploaded_file($tempFile, $targetFile); //6
	$image = $file_name;
				
	$sql1 = "update brand set image='$image' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}

if($res){
	header('location: brand.php?success');
}else{
	header('location: brand.php?error');
}
?>
